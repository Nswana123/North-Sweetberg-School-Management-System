<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
      protected $fillable = ['code', 'title'];

    public function programs()
    {
        return $this->belongsToMany(Program::class, 'course_program_year')
                    ->withPivot('year_of_study')
                    ->withTimestamps();
    }
}
