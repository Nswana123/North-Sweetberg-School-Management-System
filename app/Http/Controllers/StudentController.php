<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use App\Models\Campus;
use App\Models\School;
use App\Models\Department;
use App\Models\Program;
use App\Models\NextOfKin;
use App\Models\StudentAddress;
use Illuminate\Http\Request;
use App\Mail\AdmissionApprovedMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class StudentController extends Controller
{
    public function index(Request $request)
    {
       $query = Student::with('user', 'campus', 'school', 'department', 'program');

    if ($request->filled('student_number')) {
        $query->whereHas('user', function ($q) use ($request) {
            $q->where('student_number', 'like', '%' . $request->student_number . '%');
        });
    }
    
    $students = $query->paginate(10);
       $user = auth()->user();
        $permissions = $user->user_group->permissions;
        return view('students.index', compact('students','permissions'));
    }

    public function create()
    {
        $users       = User::doesntHave('student')->get();
        $campuses    = Campus::all();
        $schools     = School::all();
        $departments = Department::all();
        $programs    = Program::all();
        return view('students.create', compact(
            'users','campuses','schools','departments','programs'
        ));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id'                       => 'required|exists:users,id',
            'campus_id'                     => 'required|exists:campuses,id',
            'school_id'                     => 'required|exists:schools,id',
            'department_id'                 => 'required|exists:departments,id',
            'program_id'                    => 'required|exists:programs,id',
            'year_of_study'                 => 'required|integer',
            'status'                        => 'required|string',
            'next_of_kins.full_name'        => 'required|string',
            'next_of_kin.relationship'     => 'required|string',
            'address.physical_address'     => 'required|string',
        ]);

        $student = Student::create($request->only([
            'user_id','campus_id','school_id','department_id',
            'program_id','year_of_study','status'
        ]));

        $student->nextOfKin()->create($request->input('next_of_kins'));
        $student->address()->create($request->input('address'));

        return redirect()->route('students.index');
    }

    public function show(Student $student)
    {
        $student->load('user','campus','school','department','program','nextOfKin','address');
               $user = auth()->user();
        $permissions = $user->user_group->permissions;
        return view('students.show', compact('student','permissions'));
    }

    public function edit(Student $student)
    {
        $users       = User::get();
        $campuses    = Campus::all();
        $schools     = School::all();
        $departments = Department::all();
        $programs    = Program::all();
               $user = auth()->user();
        $permissions = $user->user_group->permissions;
        return view('students.edit', compact(
            'student','users','campuses','schools','departments','programs','permissions'
        ));
        
    }

    public function update(Request $request, Student $student)
    {
        $student->update($request->only([
            'campus_id','school_id','department_id','program_id',
            'year_of_study','status'
        ]));

        $student->nextOfKin()->update($request->input('next_of_kin'));
        $student->address()->update($request->input('address'));

        return redirect()->route('students.show', $student);
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index');
    }


  public function allPayments()
{
    $students = Student::with(['user', 'program.fees', 'payments'])->get();

    $summaries = $students->map(function ($student) {
        $totalFees = $student->program->fees
            ->where('year_of_study', $student->year_of_study)
            ->sum('amount');

        $totalPaid = $student->payments->sum('amount');

        return [
            'name' => $student->user->fname . ' ' . $student->user->lname,
            'student_number' => $student->user->student_number,
            'program' => $student->program->name,
            'year_of_study' => $student->year_of_study,
            'total_fees' => $totalFees,
            'total_paid' => $totalPaid,
            'balance' => $totalFees - $totalPaid,
        ];
    });
               $user = auth()->user();
        $permissions = $user->user_group->permissions;
    return view('students.paymentStatement', compact('summaries','permissions'));
}

public function profile()
{
    $user = auth()->user();
        $permissions = $user->user_group->permissions;
    $student = \App\Models\Student::with([
        'user', 'campus', 'program', 'nextOfKin', 'address'
    ])->where('user_id', $user->id)->firstOrFail();

    return view('students.studentProfile', compact('student','permissions'));
}

 public function createStudent()
    {
        $programs = Program::with('department.school')->get();
        $user = auth()->user();
        $permissions = $user->user_group->permissions;
        return view('students.createStudent', compact('programs','permissions'));
    }

    public function storeStudent(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'gender' => 'required|string',
            'national_id' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string',
            'program_id' => 'required|exists:programs,id',
            'year_of_study' => 'required|integer|min:1',
            'secondary_school' => 'required|string',
            'completion_year' => 'required|integer',
            'street_address' => 'required|string',
            'town' => 'required|string',
            'province' => 'required|string',
            'next_of_kin_name' => 'required|string',
            'next_of_kin_relationship' => 'required|string',
            'next_of_kin_phone' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        DB::beginTransaction();

        try {
            // Get program details
            $program = Program::with('department.school')->findOrFail($request->program_id);
            $school = $program->department->school;
            $campus = $school->campuses()->first();

            if (!$campus) {
                throw new \Exception("No campus associated with this school.");
            }

            // Generate student number
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

            // Handle photo upload
            $photoPath = null;
            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('student_photos', 'public');
            }

            // Create user
            $user = User::create([
                'student_number' => $studentNumber,
                'fname' => $request->first_name,
                'lname' => $request->last_name,
                'email' => $request->email,
                'national_id' => $request->national_id,
                'mobile' => $request->phone,
                'dob' => $request->dob,
                'gender' => $request->gender,
                'status' => 'active',
                'location' => $request->town,
                'group_id' => 2, // Assuming 2 is the student group
                'email_verified_at' => now(),
                'password' => Hash::make($temporaryPassword),
                'photo_path' => $photoPath,
            ]);

            // Create student
            $student = Student::create([
                'user_id' => $user->id,
                'campus_id' => $campus->id,
                'school_id' => $school->id,
                'department_id' => $program->department->id,
                'program_id' => $program->id,
                'year_of_study' => $request->year_of_study,
                'status' => 'active',
                'secondary_school' => $request->secondary_school,
                'completion_year' => $request->completion_year,
            ]);

            // Create next of kin
            NextOfKin::create([
                'student_id' => $student->id,
                'full_name' => $request->next_of_kin_name,
                'relationship' => $request->next_of_kin_relationship,
                'phone' => $request->next_of_kin_phone,
            ]);

            // Create student address
            StudentAddress::create([
                'student_id' => $student->id,
                'physical_address' => $request->street_address,
                'town' => $request->town,
                'province' => $request->province,
                'country' => 'Zambia',
            ]);

            DB::commit();

       Mail::to($user->email)->send(new AdmissionApprovedMail($studentNumber, $temporaryPassword));

            return redirect()->back()->with('success', 'Student created successfully. Temporary password: ' . $temporaryPassword);

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error creating student: ' . $e->getMessage())->withInput();
        }
    }

}