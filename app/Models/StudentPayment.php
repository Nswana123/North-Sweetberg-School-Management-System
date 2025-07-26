<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentPayment extends Model
{
    protected $fillable = ['student_id', 'amount', 'method', 'reference', 'payment_purpose', 'status'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
