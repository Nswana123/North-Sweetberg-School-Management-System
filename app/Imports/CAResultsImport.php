<?php

namespace App\Imports;

use App\Models\Student;
use App\Models\Course;
use App\Models\StudentResult;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CAResultsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
{
    // Normalize keys to lowercase
    $row = array_change_key_case($row, CASE_LOWER);

    // Adjust keys based on your actual Excel columns:
    if (empty($row['student_number']) || empty($row['course_id']) || !isset($row['ca_marks'])) {
        Log::warning('Skipped row due to missing required data', $row);
        return null; // skip this row
    }

    $student = Student::whereHas('user', function ($q) use ($row) {
        $q->where('student_number', $row['student_number']);
    })->first();

    $course = Course::where('code', $row['course_id'])->first();  // use course_id value as course_code

    if ($student && $course) {
        $result = StudentResult::firstOrNew([
            'student_id' => $student->id,
            'course_id' => $course->id,
            'academic_year' => now()->year,
        ]);

        $result->ca_mark = $row['ca_marks'];  // note 'ca_marks' not 'ca_mark'
        $result->save();
    } else {
        Log::warning('Student or Course not found for row', $row);
    }
}
}
