<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'user_id', 'campus_id', 'school_id', 'department_id',
        'program_id', 'year_of_study', 'status'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function program() {
        return $this->belongsTo(Program::class);
    }

    public function campus() {
        return $this->belongsTo(Campus::class);
    }

    public function school() {
        return $this->belongsTo(School::class);
    }

    public function department() {
        return $this->belongsTo(Department::class);
    }

    public function registeredCourses() {
        return $this->hasMany(RegisteredCourse::class);
    }

    public function nextOfKin()
{
    return $this->hasOne(NextOfKin::class);
}

        public function address()
        {
            return $this->hasOne(StudentAddress::class);
        }
        public function payments()
{
    return $this->hasMany(StudentPayment::class);
}
public function courseRegistrations()
{
    return $this->hasMany(StudentCourseRegistration::class);
}

}
