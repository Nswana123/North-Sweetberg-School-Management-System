<?php
namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Course;
use App\Models\User;
use App\Models\StudentCourseRegistration;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StudentCourseController extends Controller
{
    // Show registration form and list of registered courses
    public function showCourseRegistrationForm()
    {
        $user = auth()->user();
        $permissions = $user->user_group->permissions;
        $student = Student::with('program')->where('user_id', $user->id)->first();

        if (!$student) {
            return back()->with('error', 'Student record not found.');
        }

        // Available courses for student's program and year
        $availableCourses = DB::table('course_program_year')
            ->join('courses', 'course_program_year.course_id', '=', 'courses.id')
            ->where('course_program_year.program_id', $student->program_id)
            ->where('course_program_year.year_of_study', $student->year_of_study)
            ->select('courses.*')
            ->get();

        // Already registered courses
        $registeredCourses = StudentCourseRegistration::with('course')
            ->where('student_id', $student->id)
            ->where('academic_year', now()->year)
            ->get();

        return view('students.register_courses', compact('student', 'availableCourses', 'registeredCourses','permissions'));
    }

    // Register selected courses
    public function registerCourses(Request $request)
    {
        $request->validate([
            'course_ids' => 'required|array',
            'course_ids.*' => 'exists:courses,id',
        ]);

        $user = auth()->user();
        $student = Student::where('user_id', $user->id)->first();
        $year = now()->year;

        foreach ($request->course_ids as $courseId) {
            StudentCourseRegistration::updateOrCreate(
                [
                    'student_id' => $student->id,
                    'course_id' => $courseId,
                    'academic_year' => $year,
                ],
                [] // no additional fields
            );
        }

        return redirect()->back()->with('success', 'Courses registered successfully.');
    }
}
