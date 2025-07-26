<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'school_id'];

 public function school()
{
    return $this->belongsTo(School::class);
}


    public function programs()
    {
        return $this->hasMany(Program::class);
    }

    // Remove this - it's incorrect and duplicates the school relationship
    // public function departments()
    // {
    //     return $this->hasManyThrough(Department::class, School::class);
    // }
}