<?php

namespace App\Http\Controllers;
use App\Models\Department;
use App\Models\School;
use Illuminate\Http\Request;
class DepartmentController extends Controller
{
public function index()
{
    $departments = Department::with('school')->paginate(10);
          $user = auth()->user();
        $permissions = $user->user_group->permissions;
    return view('departments.index', compact('departments','permissions'));
}

public function create()
{
    $schools = School::all();
          $user = auth()->user();
        $permissions = $user->user_group->permissions;
    return view('departments.create', compact('schools','permissions'));
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'school_id' => 'required|exists:schools,id',
    ]);

    Department::create($request->all());
    return redirect()->route('departments.index')->with('success', 'Department created successfully.');
}

public function edit($id)
{
    $department = Department::findOrFail($id);
    $schools = School::all();
          $user = auth()->user();
        $permissions = $user->user_group->permissions;
    return view('departments.edit', compact('department', 'schools','permissions'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'school_id' => 'required|exists:schools,id',
    ]);

    $department = Department::findOrFail($id);
    $department->update($request->all());

    return redirect()->route('departments.index')->with('success', 'Department updated successfully.');
}

public function destroy($id)
{
    Department::destroy($id);
    return redirect()->route('departments.index')->with('success', 'Department deleted.');

}
}