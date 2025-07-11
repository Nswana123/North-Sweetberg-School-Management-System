<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradingSetting extends Model
{
    use HasFactory;

    protected $fillable = ['min', 'max', 'grade', 'comment'];
}
