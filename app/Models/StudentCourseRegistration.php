<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentCourseRegistration extends Model
{
    protected $fillable = ['student_id', 'course_id', 'academic_year'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
