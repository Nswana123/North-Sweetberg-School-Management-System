<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
      protected $fillable = ['name', 'school_id'];

   public function school()
{
    return $this->belongsTo(School::class, 'school_id');
}

    public function programs()
    {
        return $this->hasMany(Program::class);
    }
    public function departments()
{
    return $this->hasManyThrough(Department::class, School::class);
}
}
