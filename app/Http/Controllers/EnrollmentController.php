<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Program;
use App\Models\Admission;
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

  public function PendingEnrollment()
    {
        $admissions = Admission::with('payment')->where('admission_status','pending')->orderBy('created_at', 'desc')->get(); 
        $user = auth()->user();
        $permissions = $user->user_group->permissions;

        return view('enrollment.PendingEnrollment', compact('admissions','permissions'));
    }

    public function showPendingEnrollment($id)
    {
        $admission = Admission::with('payment')->findOrFail($id);
         $user = auth()->user();
        $permissions = $user->user_group->permissions;

        return view('admissions.show', compact('admission','permissions'));
    }

    public function approve($id)
    {
        $admission = Admission::findOrFail($id);
        $admission->admission_status = 'approved';
        $admission->save();

        return redirect()->route('enrollment.showPendingEnrollment', $id)->with('success', 'Admission approved.');
    }

    public function reject($id)
    {
        $admission = Admission::findOrFail($id);
        $admission->admission_status = 'rejected';
        $admission->save();

        return redirect()->route('enrollment.showPendingEnrollment', $id)->with('error', 'Admission rejected.');
    }

     public function approvedEnrollment()
    {
        $admissions = Admission::with('payment')->where('admission_status','approved')->orderBy('created_at', 'desc')->get(); 
        $user = auth()->user();
        $permissions = $user->user_group->permissions;

        return view('enrollment.approvedEnrollment', compact('admissions','permissions'));
    }

      public function rejectedEnrollment()
    {
        $admissions = Admission::with('payment')->where('admission_status','rejected')->orderBy('created_at', 'desc')->get(); 
        $user = auth()->user();
        $permissions = $user->user_group->permissions;

        return view('enrollment.rejectedEnrollment', compact('admissions','permissions'));
    }

}