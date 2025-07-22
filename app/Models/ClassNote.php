<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassNote extends Model
{
         protected $table = 'class_notes';
    protected $fillable = ['class_id', 'user_id', 'title', 'description', 'file_path', 'type'];

    public function class() {
        return $this->belongsTo(Classroom::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}

