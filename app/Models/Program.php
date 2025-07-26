<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'program_code',
        'mode_of_study',
        'qualification',
        'is_practical',
        'duration',
        'department_id',
        'level' // Added this field to support degree/diploma/short course filtering
    ];

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
 public function admissions()
    {
        return $this->hasMany(Admission::class);
    }
    public function fees()
    {
        return $this->hasMany(Fee::class);
    }
    public function firstFee()
{
    return $this->hasOne(Fee::class)->orderBy('year_of_study')->oldest(); // Adjust ordering if needed
}

    public function campuses()
    {
        return $this->belongsToMany(Campus::class, 'campus_program');
    }

    // Improved school relationship accessor
    public function getSchoolAttribute()
    {
        return $this->department->school ?? null;
    }

    // Scope for filtering by level
    public function scopeOfLevel($query, $level)
    {
        return $query->where('level', $level);
    }
}