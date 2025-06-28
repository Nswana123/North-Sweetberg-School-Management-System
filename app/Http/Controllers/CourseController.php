<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Campus;
use App\Models\Program;
use App\Models\Department;
use App\Models\Course;
class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::paginate(10);
        $user = auth()->user();
        $permissions = $user->user_group->permissions;
        return view('courses.index', compact('courses','permissions'));
    }

    public function create()
    {
        $user = auth()->user();
        $permissions = $user->user_group->permissions;
        return view('courses.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:courses',
            'title' => 'required|string',
            'credit_hours' => 'required|integer',
        ]);

        Course::create($request->all());
        return redirect()->route('courses.index')->with('success', 'Course created');
    }

    public function edit(Course $course)
    {
        $user = auth()->user();
        $permissions = $user->user_group->permissions;
        return view('courses.edit', compact('course','permissions'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'code' => 'required|unique:courses,code,' . $course->id,
            'title' => 'required|string',
            'credit_hours' => 'required|integer',
        ]);

        $course->update($request->all());
        return redirect()->route('courses.index')->with('success', 'Course updated');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted');
    }
}
