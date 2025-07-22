<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\ClassNote;
use App\Models\ClassMessage;
use App\Models\ClassMedia;
use App\Models\ClassAssignment;
use App\Models\Test;
use App\Models\Course;
use App\Models\TestQuestion;
use App\Models\StudentCourseRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LectureClassController extends Controller
{
    public function index()
    {
        $classes = Classroom::get();
            $user = auth()->user();
        $permissions = $user->user_group->permissions;
        return view('classes.index', compact('classes','permissions'));
    }

    public function create()
    {
            $user = auth()->user();
        $permissions = $user->user_group->permissions;
        $courses = Course:: get();
        return view('classes.create', compact('permissions','courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'course_id' => 'required|exists:courses,id'
        ]);

        $class = Classroom::create([
            'title' => $request->title,
            'course_id' => $request->course_id,
            'lecturer_id' => Auth::id(),
        ]);

        // Automatically add students registered for this course
        $students = StudentCourseRegistration::where('course_id', $request->course_id)->get();
        foreach ($students as $student) {
            $class->students()->attach($student->student_id);
        }

        return redirect()->route('classes.index');
    }

    public function manage(Classroom $class)
    {
      
            $user = auth()->user();
        $permissions = $user->user_group->permissions;
        return view('classes.manage', compact('class','permissions'));
    }

    public function uploadNote(Request $request, Classroom $class)
    {
        $request->validate([
            'title' => 'required',
            'note_file' => 'required|file|mimes:pdf,doc,docx'
        ]);

        $path = $request->file('note_file')->store('notes');

        ClassNote::create([
            'class_id' => $class->id,
            'title' => $request->title,
            'note_file' => $path,
        ]);

        return back();
    }

    public function sendMessage(Request $request, Classroom $class)
    {
        $request->validate([
            'message' => 'required'
        ]);

        ClassMessage::create([
            'class_id' => $class->id,
            'sender_id' => Auth::id(),
            'message' => $request->message,
        ]);

        return back();
    }

    public function sendMedia(Request $request, Classroom $class)
    {
        $request->validate([
            'media' => 'required|file|mimes:mp4,mp3,mov,avi,ogg'
        ]);

        $path = $request->file('media')->store('media');

        ClassMedia::create([
            'class_id' => $class->id,
            'file_path' => $path,
        ]);

        return back();
    }

    public function createAssignment(Request $request, Classroom $class)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'due_date' => 'required|date'
        ]);

        ClassAssignment::create([
            'class_id' => $class->id,
            'lecturer_id' => $class->lecturer_id,
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
        ]);

        return back();
    }

    public function createTest(Request $request, Classroom $class)
    {
        $request->validate([
            'title' => 'required',
            'questions' => 'required|array'
        ]);

        $test = Test::create([
            'class_id' => $class->id,
            'title' => $request->title,
        ]);

        foreach ($request->questions as $q) {
            $question = TestQuestion::create([
                'test_id' => $test->id,
                'question_text' => $q['question_text'],
                'question_type' => $q['question_type'],
                'marks' => $q['marks'],
            ]);

            if ($q['question_type'] === 'multiple_choice') {
                foreach ($q['options'] as $opt) {
                    $question->options()->create([
                        'option_text' => $opt['text'],
                        'is_correct' => $opt['is_correct'],
                    ]);
                }
            }
        }

        return back();
    }
}
