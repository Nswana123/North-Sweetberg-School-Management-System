<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassMessage extends Model
{
     protected $table = 'class_messages';
 
    protected $fillable = ['class_id', 'sender_id', 'message', 'voice_note'];

    public function class() {
        return $this->belongsTo(Classroom::class);
    }

    public function sender() {
        return $this->belongsTo(User::class, 'sender_id');
    }
}

