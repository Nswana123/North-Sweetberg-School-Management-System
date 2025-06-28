<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
       protected $fillable = ['name','program_code','mode_of_study','qualification','is_practical','duration', 'department_id'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_program_year')
                    ->withPivot('year_of_study')
                    ->withTimestamps();
    }

    public function fees()
    {
        return $this->hasMany(Fee::class);
    }

    public function campuses()
    {
        return $this->belongsToMany(Campus::class, 'campus_program'); // make sure this table exists
    }
    public function school()
{
    return $this->department ? $this->department->school() : null;
}
}
