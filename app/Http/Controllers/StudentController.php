<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use App\Models\Campus;
use App\Models\School;
use App\Models\Department;
use App\Models\Program;
use Illuminate\Http\Request;

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

}