<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Course;
use App\Models\StudentResult;
use Illuminate\Support\Facades\Auth;
use App\Helpers\GradingHelper;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CAResultsImport;
use App\Imports\ExamResultsImport;
use App\Models\StudentCourseRegistration;
use PDF;

class ResultsController extends Controller
{
     public function showEnterCAForm(Request $request) {
        $courses = Course::all();
        $selected = $request->course_id;
        $students = $selected ? Student::whereHas('courseRegistrations', fn($q) => $q->where('course_id', $selected))->get() : [];
         $user = auth()->user();
        $permissions = $user->user_group->permissions;
        return view('results.enterCAs', compact('courses', 'selected', 'students','permissions'));
    }

    public function storeCA(Request $request) {
        foreach ($request->marks as $studentId => $mark) {
            $result = StudentResult::firstOrNew([
                'student_id' => $studentId,
                'course_id' => $request->course_id,
                'academic_year' => $request->academic_year,
            ]);
            $result->ca_mark = $mark;
            $result->final_mark = $mark + ($result->exam_mark ?? 0);
            if (!is_null($result->final_mark)) {
                $grade = GradingHelper::assignGrade($result->final_mark);
                $result->grade = $grade->grade ?? null;
                $result->comment = $grade->comment ?? null;
            }
            $result->save();
        }
        return back()->with('success', 'CA saved');
    }

    public function viewCAMarks(Request $request) {
        $courses = Course::all();
        $results = collect();
        if ($request->course_id) {
            $results = StudentResult::with('student.user')->where('course_id', $request->course_id)->get();
        }
         $user = auth()->user();
        $permissions = $user->user_group->permissions;
        return view('results.viewCAs', compact('courses', 'results','permissions'));
    }

    public function showEnterExamForm(Request $request) {
        $courses = Course::all();
        $selected = $request->course_id;
        $students = $selected ? Student::whereHas('courseRegistrations', fn($q) => $q->where('course_id', $selected))->get() : [];
         $user = auth()->user();
        $permissions = $user->user_group->permissions;
        return view('results.enterExam', compact('courses', 'selected', 'students','permissions'));
    }

    public function storeExam(Request $request) {
        foreach ($request->marks as $studentId => $mark) {
            $result = StudentResult::firstOrNew([
                'student_id' => $studentId,
                'course_id' => $request->course_id,
                'academic_year' => $request->academic_year,
            ]);
            $result->exam_mark = $mark;
            $result->final_mark = ($result->ca_mark ?? 0) + $mark;
            if (!is_null($result->final_mark)) {
                $grade = GradingHelper::assignGrade($result->final_mark);
                $result->grade = $grade->grade ?? null;
                $result->comment = $grade->comment ?? null;
            }
            $result->save();
        }
        return back()->with('success', 'Exam saved');
    }

    public function viewExamMarks(Request $request) {
        $courses = Course::all();
        $results = collect();
        if ($request->course_id) {
            $results = StudentResult::with('student.user')->where('course_id', $request->course_id)->get();
        }
         $user = auth()->user();
        $permissions = $user->user_group->permissions;
        return view('results.viewExam', compact('courses', 'results','permissions'));
    }

    public function viewFinalResults(Request $request)
{
     $query = Student::with(['user', 'program']);

        // Filter by student number if provided
        if ($request->filled('student_number')) {
            $studentNumber = $request->student_number;
            $query->whereHas('user', function ($q) use ($studentNumber) {
                $q->where('student_number', 'like', "%{$studentNumber}%");
            });
        }

        $students = $query->get();
      $user = auth()->user();
        $permissions = $user->user_group->permissions;

    return view('results.viewfinal', compact('students','permissions'));
}

    public function showStudentFinalResults(Student $student) {
        $results = StudentResult::with('course')
                    ->where('student_id', $student->id)
                    ->orderBy('academic_year', 'desc')
                    ->get()
                    ->groupBy('academic_year');
                    $user = auth()->user();
        $permissions = $user->user_group->permissions;
        return view('results.viewstudentResults', compact('student', 'results','permissions'));
    }


     public function uploadCA(Request $request) {
        $request->validate(['file' => 'required|mimes:xlsx,xls']);
        Excel::import(new CAResultsImport, $request->file('file'));
        return back()->with('success', 'CA Results Uploaded Successfully.');
    }

    public function uploadExam(Request $request) {
        $request->validate(['file' => 'required|mimes:xlsx,xls']);
        Excel::import(new ExamResultsImport, $request->file('file'));
        return back()->with('success', 'Exam Results Uploaded Successfully.');
    }


     public function viewCA()
    {
        $student = Student::where('user_id', Auth::id())->firstOrFail();

        $results = StudentResult::with('course')
            ->where('student_id', $student->id)
            ->whereNotNull('ca_mark')
            ->orderByDesc('academic_year')
            ->get()
            ->groupBy('academic_year');
    $user = auth()->user();
        $permissions = $user->user_group->permissions;
        return view('students.resultsCa', compact('student', 'results','permissions'));
    }

    public function viewFinal()
    {
        $student = Student::where('user_id', Auth::id())->firstOrFail();

        $results = StudentResult::with('course')
            ->where('student_id', $student->id)
            ->whereNotNull('final_mark')
            ->orderByDesc('academic_year')
            ->get()
            ->groupBy('academic_year');
    $user = auth()->user();
        $permissions = $user->user_group->permissions;
        return view('students.resultsFinal', compact('student', 'results','permissions'));
    }

    public function exportFinalResultsPdf($studentId)
{
    $student = Student::with(['user', 'program'])->findOrFail($studentId);

    $results = StudentResult::with('course')
        ->where('student_id', $student->id)
        ->orderBy('academic_year', 'desc')
        ->get()
        ->groupBy('academic_year');

    $pdf = PDF::loadView('results.pdf_final_results', compact('student', 'results'));
    return $pdf->download('Final_Results_' . $student->user->student_number . '.pdf');
}
public function SlipView()
{
    $user = auth()->user();
    $student = Student::with('program')->where('user_id', $user->id)->firstOrFail();

    $currentAcademicYear = now()->year . '/' . (now()->year + 1); // or use a helper/config

    // Get registered courses for the current academic year
    $registeredCourses = StudentCourseRegistration::with('course')
        ->where('student_id', $student->id)
        ->where('academic_year', $currentAcademicYear)
        ->get();

    $permissions = $user->user_group->permissions;

    return view('students.examSlip', compact('student', 'registeredCourses', 'permissions'));
}

public function SlipexportPdf()
{
    $user = auth()->user();
    $student = Student::with('program')->where('user_id', $user->id)->firstOrFail();

    $currentAcademicYear = now()->year . '/' . (now()->year + 1);

    $registeredCourses = StudentCourseRegistration::with('course')
        ->where('student_id', $student->id)
        ->where('academic_year', $currentAcademicYear)
        ->get();

    $pdf = Pdf::loadView('students.pdfexamSlip', compact('student', 'registeredCourses'));

    return $pdf->download('exam_slip_' . $student->user->student_number . '.pdf');
}
}
