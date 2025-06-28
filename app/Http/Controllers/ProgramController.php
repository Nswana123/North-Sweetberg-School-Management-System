<?php

namespace App\Http\Controllers;
use App\Models\School;
use App\Models\Campus;
use App\Models\Program;
use App\Models\Department;
use App\Models\Course;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
{
    $programs = Program::with('department')->paginate(10);
        $user = auth()->user();
        $permissions = $user->user_group->permissions;
    return view('programs.index', compact('programs','permissions'));
}
public function create()
{
    $departments = Department::with('school')->get();
     $user = auth()->user();
        $permissions = $user->user_group->permissions;
    return view('programs.create', compact('departments','permissions'));
}

public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'program_code' => 'required|string|max:50|unique:programs',
        'mode_of_study' => 'required|string',
        'qualification' => 'required|string',
        'is_practical' => 'required|string|in:yes,no',
        'duration' => 'required|integer|min:1',
        'department_id' => 'required|exists:departments,id',
    ]);

    Program::create($validated);

    return redirect()->route('programs.index')->with('success', 'Program created successfully.');
}
public function show($id)
{
    $program = Program::with([
        'department.school.campuses',
        'fees',
        'courses'
        
    ])->findOrFail($id);
        $allCourses = Course::all(); // For checkbox display

    // Get grouped courses by year
    $groupedCourses = $program->courses->groupBy('pivot.year_of_study');
        $user = auth()->user();
        $permissions = $user->user_group->permissions;

    $campuses = $program->department->school->campuses ?? collect();

    return view('programs.show', compact('program', 'groupedCourses', 'campuses','permissions','allCourses'));
}

public function edit($id)
{
    $program = Program::findOrFail($id);
    $departments = Department::all();
        $user = auth()->user();
        $permissions = $user->user_group->permissions;
    return view('programs.edit', compact('program', 'departments','permissions'));
}

public function update(Request $request, $id)
{
    $program = Program::findOrFail($id);
    $program->update($request->all());

    return redirect()->route('programs.index')->with('success', 'Program updated.');
}

public function destroy($id)
{
    Program::findOrFail($id)->delete();
    return redirect()->route('programs.index')->with('success', 'Deleted successfully.');
}

public function assignCourses(Request $request, Program $program)
{
    $validated = $request->validate([
        'courses' => 'required|array',
    ]);

    foreach ($validated['courses'] as $course_id => $data) {
        if (isset($data['selected']) && !empty($data['year'])) {
            $program->courses()->syncWithoutDetaching([
                $course_id => ['year_of_study' => $data['year']]
            ]);
        }
    }

    return redirect()->route('programs.show', $program->id)->with('success', 'Courses assigned successfully.');
}

}
