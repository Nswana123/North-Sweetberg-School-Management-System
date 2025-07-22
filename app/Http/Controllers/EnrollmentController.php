<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Campus;
use App\Models\Program;
use App\Models\Department;
use App\Models\Course;
class EnrollmentController extends Controller
{
        public function index(){
         return view('enrollment.applynow');

    }
}
