<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Program;
use App\Models\Department;

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



}