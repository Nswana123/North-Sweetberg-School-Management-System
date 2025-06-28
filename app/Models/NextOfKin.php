<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NextOfKin extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'full_name',
        'relationship',
        'phone',
        'email',
        'address',
    ];

    /**
     * Get the student that this next of kin belongs to.
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
