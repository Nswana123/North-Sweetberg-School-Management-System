<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
     protected $table = 'classes';
    protected $fillable = ['course_id', 'lecturer_id', 'title', 'description'];

    public function students() {
        return $this->belongsToMany(Student::class, 'class_student');
    }

    public function notes() {
        return $this->hasMany(ClassNote::class);
    }

    public function messages() {
        return $this->hasMany(ClassMessage::class);
    }

    public function assignments() {
        return $this->hasMany(ClassAssignment::class);
    }

    public function tests() {
        return $this->hasMany(Test::class);
    }
}

