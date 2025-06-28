<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course_program_year extends Model
{
    protected $table = 'course_program_year'; // explicitly set table name

    protected $fillable = [
        'program_id',
        'course_id',
        'year_of_study',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
