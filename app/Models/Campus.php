<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
      protected $fillable = ['name', 'location'];


    public function departments()
    {
        return $this->hasManyThrough(Department::class, School::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class); // if applicable
    }

  

    public function programs()
{
    return $this->hasManyThrough(Program::class, Department::class, 'school_id', 'department_id')
                ->join('schools', 'schools.id', '=', 'departments.school_id')
                ->where('schools.campus_id', $this->id);
}

public function schools()
{
    return $this->belongsToMany(School::class, 'campus_school');
}
}
