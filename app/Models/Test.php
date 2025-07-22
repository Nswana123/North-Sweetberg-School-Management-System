<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
           protected $table = 'tests';
    protected $fillable = ['class_id', 'title', 'instructions', 'start_time', 'end_time'];

    public function questions() {
        return $this->hasMany(TestQuestion::class);
    }
}

