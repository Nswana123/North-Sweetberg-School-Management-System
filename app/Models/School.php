<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'campus_id'];

   public function campus()
{
    return $this->belongsTo(Campus::class);
}


    public function departments()
    {
        return $this->hasMany(Department::class);
    }

    // Remove this if you're using the belongsToMany relationship below
    public function campuses()
    {
        return $this->belongsToMany(Campus::class, 'campus_school');
    }

    // Helper method to get all programs through departments
    public function programs()
    {
        return $this->hasManyThrough(
            Program::class,
            Department::class,
            'school_id', // Foreign key on departments table
            'department_id', // Foreign key on programs table
            'id', // Local key on schools table
            'id' // Local key on departments table
        );
    }
}