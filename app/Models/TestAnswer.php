<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestAnswer extends Model
{
     protected $table = 'test_answers';
    protected $fillable = ['test_id', 'question_id', 'student_id', 'answer', 'marks_awarded'];

    public function question() {
        return $this->belongsTo(TestQuestion::class);
    }

    public function student() {
        return $this->belongsTo(Student::class);
    }
}
