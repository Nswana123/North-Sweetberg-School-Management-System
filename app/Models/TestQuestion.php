<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestQuestion extends Model
{
      protected $table = 'test_questions';
    protected $fillable = ['test_id', 'question_text', 'type', 'options', 'correct_answer', 'marks'];

    protected $casts = [
        'options' => 'array',
    ];

    public function options()
{
    return $this->hasMany(QuestionOption::class);
}
}

