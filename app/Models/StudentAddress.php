<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'physical_address',
        'postal_address',
        'town',
        'province',
        'country', 
    ];

    /**
     * Get the student that owns this address.
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
