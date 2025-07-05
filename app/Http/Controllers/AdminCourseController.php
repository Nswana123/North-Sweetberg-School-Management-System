<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function registeredStudentsByYear(Request $request)
    {
   

         $user = auth()->user();
        $permissions = $user->user_group->permissions;

    $selectedYear = $request->get('year', now()->year);

    $students = Student::with(['user', 'program'])
        ->withCount(['courseRegistrations as course_count' => function ($q) use ($selectedYear) {
            $q->where('academic_year', $selectedYear);
        }])
        ->whereHas('courseRegistrations', function ($q) use ($selectedYear) {
            $q->where('academic_year', $selectedYear);
        })
        ->get()
        ->groupBy('year_of_study');

 

        return view('students.registered_students_by_year', compact('students', 'selectedYear','permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
