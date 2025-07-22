<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassAssignment extends Model
{
         protected $table = 'class_assignments';
         
    protected $fillable = ['class_id', 'lecturer_id', 'title', 'instructions', 'due_date'];

    public function submissions() {
        return $this->hasMany(AssignmentSubmission::class, 'assignment_id');
    }

    public function lecturer() {
        return $this->belongsTo(User::class, 'lecturer_id');
    }
}

