<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcademicCalendar extends Model
{
    use SoftDeletes;
protected $table = 'academic_calendars';
    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'type',
        'location'
    ];

    protected $casts = [
    'start_date' => 'date:Y-m-d',
    'end_date' => 'date:Y-m-d',
];
    public function scopeUpcoming($query, $days = 30)
    {
        return $query->where('start_date', '>=', now())
            ->where('start_date', '<=', now()->addDays($days))
            ->orderBy('start_date');
    }

    public function scopeCurrent($query)
    {
        return $query->where('start_date', '<=', now())
            ->where('end_date', '>=', now());
    }

    public function getDurationAttribute()
    {
        return $this->start_date->diffInDays($this->end_date) + 1;
    }
}