<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
     protected $fillable = ['program_id', 'year_of_study', 'amount','registration_threshold','exam_threshold' ];

    public function program()
    {
        return $this->belongsTo(program::class);
    }
}
