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
        
        return view('enrollment.applynow', compact('schools'));
    }

    // New API endpoint to fetch programs
    public function getPrograms(Request $request)
    {
        $schoolId = $request->input('school_id');
        $level = $request->input('level');
        
        // Validate inputs
        if (!$schoolId || !$level) {
            return response()->json(['error' => 'Missing parameters'], 400);
        }
        
        // Get programs based on school and level
        $programs = Program::whereHas('department.school', function($query) use ($schoolId) {
                $query->where('id', $schoolId);
            })
            ->where('level', $level)
            ->with('fees')
            ->orderBy('name')
            ->get();
            
        return response()->json($programs);
    }
}