<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssignmentSubmission extends Model
{
       protected $table = 'assignment_submissions';
    protected $fillable = ['assignment_id', 'student_id', 'file_path', 'marks_awarded'];

    public function assignment() {
        return $this->belongsTo(ClassAssignment::class, 'assignment_id');
    }

    public function student() {
        return $this->belongsTo(Student::class);
    }
}

