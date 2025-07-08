<?php

namespace App\Imports;

use App\Models\Student;
use App\Models\Course;
use App\Models\StudentResult;
use App\Models\GradingSetting;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ExamResultsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Normalize keys to lowercase for safety
        $row = array_change_key_case($row, CASE_LOWER);

        // Check required keys existence with fallback for course_code/course_id and exam_mark/exam_marks
        $studentNumber = $row['student_number'] ?? null;
        $courseCode = $row['course_code'] ?? ($row['course_id'] ?? null);
        $examMark = $row['exam_mark'] ?? ($row['exam_marks'] ?? null);

        if (!$studentNumber || !$courseCode || !isset($examMark)) {
            Log::warning('Skipped row due to missing required data in ExamResultsImport', $row);
            return null; // skip this row
        }

        $student = Student::whereHas('user', function ($q) use ($studentNumber) {
            $q->where('student_number', $studentNumber);
        })->first();

        $course = Course::where('code', $courseCode)->first();

        if ($student && $course) {
            $result = StudentResult::firstOrNew([
                'student_id' => $student->id,
                'course_id' => $course->id,
                'academic_year' => now()->year,
            ]);

            $result->exam_mark = $examMark;
            $result->final_mark = ($result->ca_mark ?? 0) + $examMark;

            $grading = GradingSetting::where('min', '<=', $result->final_mark)
                ->where('max', '>=', $result->final_mark)
                ->first();

            if ($grading) {
                $result->grade = $grading->grade;
                $result->comment = $grading->comment;
            }

            $result->save();
        } else {
            Log::warning('Student or Course not found for row in ExamResultsImport', $row);
        }
    }
}
