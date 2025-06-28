<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
   protected $fillable = ['name', 'campus_id'];

    public function campus()
    {
        return $this->belongsTo(Campus::class);
    }

    public function departments()
{
    return $this->hasMany(Department::class, 'school_id');
}

public function campuses()
{
    return $this->belongsToMany(Campus::class, 'campus_school');
}
}
