<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Program;
use App\Models\Admission;
use App\Models\Department;
use App\Models\User;
use App\Models\Student;
use App\Models\NextOfKin;
use App\Models\StudentAddress;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Mail\AdmissionApprovedMail;
use Illuminate\Support\Facades\Mail;
class EnrollmentController extends Controller
{
    public function index()
    {
        $schools = School::with(['departments.programs' => function($query) {
            $query->orderBy('name');
        }])->orderBy('name')->get();

       $programs = Program::with('firstFee')->get();

        
        
    $shortCourses = Program::where('qualification', 'Short Course')->orderBy('name')->get();
        return view('enrollment.applynow', compact('schools','programs','shortCourses'));
    }

  public function PendingEnrollment()
{
    $query = Admission::with('payment')
              ->where('admission_status', 'pending')
              ->orderBy('created_at', 'desc');

    // Add date filter if provided
    if (request()->has('start_date') && request('start_date') != '') {
        $query->whereDate('created_at', '>=', request('start_date'));
    }

    if (request()->has('end_date') && request('end_date') != '') {
        $query->whereDate('created_at', '<=', request('end_date'));
    }

    $admissions = $query->paginate(10);
    $user = auth()->user();
    $permissions = $user->user_group->permissions;

    return view('enrollment.PendingEnrollment', compact('admissions', 'permissions'));
}

    public function showPendingEnrollment($id)
    {
        $admission = Admission::with('payment','program')->findOrFail($id);
         $user = auth()->user();
        $permissions = $user->user_group->permissions;

        return view('enrollment.showPendingEnrollment', compact('admission','permissions'));
    }

 public function approve($id)
{
    DB::beginTransaction();

    try {
        $admission = Admission::with('program.department.school')->findOrFail($id);

        // Get school and its first associated campus via pivot
        $school = $admission->program->department->school;

        $campus = $school->campuses()->first(); // Assuming one campus per school

        if (!$campus) {
            throw new \Exception("Campus not linked to the school.");
        }

        // Generate student number: e.g. 2025000001
        $currentYear = date('Y');
        $lastUser = User::whereYear('created_at', $currentYear)
                        ->whereNotNull('student_number')
                        ->orderBy('student_number', 'desc')
                        ->first();

        if ($lastUser && preg_match('/^' . $currentYear . '(\d{6})$/', $lastUser->student_number, $matches)) {
            $nextSequence = (int) $matches[1] + 1;
        } else {
            $nextSequence = 1;
        }

        $studentNumber = $currentYear . str_pad($nextSequence, 6, '0', STR_PAD_LEFT);
          $temporaryPassword = 'Pass1234';

        // Create user
        $user = User::create([
            'student_number' => $studentNumber,
            'fname' => $admission->first_name,
            'lname' => $admission->last_name,
            'email' => $admission->email,
            'mobile' => $admission->phone,
            'status' => 'active',
            'location' => $admission->town,
            'group_id' => 2,
            'email_verified_at' => now(),
            'password' => Hash::make($temporaryPassword),
        ]);

        // Create student
        $student = Student::create([
            'user_id' => $user->id,
            'campus_id' => $campus->id,
            'school_id' => $school->id,
            'department_id' => $admission->program->department->id,
            'program_id' => $admission->program->id,
            'year_of_study' => 1,
            'status' => 'active',
        ]);

        // Create next of kin
        NextOfKin::create([
            'student_id' => $student->id,
            'full_name' => $admission->next_of_kin_name,
            'relationship' => $admission->next_of_kin_relationship,
            'phone' => $admission->next_of_kin_phone,
        ]);

        // Create student address
        StudentAddress::create([
            'student_id' => $student->id,
            'physical_address' => $admission->street_address,
            'town' => $admission->town,
            'province' => $admission->province,
            'country' => 'Zambia',
        ]);

        // Update admission status
        $admission->admission_status = 'approved';
        $admission->save();


        // Update admission status
        $admission->admission_status = 'approved';
        $admission->save();

        // Send approval email
        Mail::to($admission->email)
            ->send(new AdmissionApprovedMail($studentNumber, $temporaryPassword));

        DB::commit();

        return redirect()->route('enrollment.showPendingEnrollment', $id)
            ->with('success', 'Admission approved, student account created, and login details sent.');


    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
    }
}


public function reject($id)
{
    $validated = request()->validate([
        'rejected_comment' => 'required|string|max:255',
        'additional_comments' => 'nullable|string'
    ]);

    $admission = Admission::findOrFail($id);
    $admission->admission_status = 'rejected';
    
    // Combine the standard reason with additional comments if provided
    $rejectionReason = $validated['rejected_comment'];
    if (!empty($validated['additional_comments'])) {
        $rejectionReason .= " - " . $validated['additional_comments'];
    }
    
    $admission->rejected_comment = $rejectionReason;
    $admission->save();

    return redirect()->back()
        ->with('error', 'Admission rejected. Reason: ' . $rejectionReason);
}

     public function approvedEnrollment()
    {
    $query = Admission::with('payment')
              ->where('admission_status', 'approved')
              ->orderBy('created_at', 'desc');

    // Add date filter if provided
    if (request()->has('start_date') && request('start_date') != '') {
        $query->whereDate('created_at', '>=', request('start_date'));
    }

    if (request()->has('end_date') && request('end_date') != '') {
        $query->whereDate('created_at', '<=', request('end_date'));
    }

    $admissions = $query->paginate(10);
    $user = auth()->user();
    $permissions = $user->user_group->permissions;

        return view('enrollment.approvedEnrollment', compact('admissions','permissions'));
    }

      public function rejectedEnrollment()
    {
      $query = Admission::with('payment')
              ->where('admission_status', 'rejected')
              ->orderBy('created_at', 'desc');

    // Add date filter if provided
    if (request()->has('start_date') && request('start_date') != '') {
        $query->whereDate('created_at', '>=', request('start_date'));
    }

    if (request()->has('end_date') && request('end_date') != '') {
        $query->whereDate('created_at', '<=', request('end_date'));
    }

    $admissions = $query->paginate(10);
    $user = auth()->user();
    $permissions = $user->user_group->permissions;

        return view('enrollment.rejectedEnrollment', compact('admissions','permissions'));
    }

        public function showApprovedEnrollment($id)
    {
        $admission = Admission::with('payment','program')->findOrFail($id);
         $user = auth()->user();
        $permissions = $user->user_group->permissions;

        return view('enrollment.showApprovedEnrollment', compact('admission','permissions'));
    }
         public function showRejectedEnrollment($id)
    {
        $admission = Admission::with('payment','program')->findOrFail($id);
         $user = auth()->user();
        $permissions = $user->user_group->permissions;

        return view('enrollment.showRejectedEnrollment', compact('admission','permissions'));
    }

}