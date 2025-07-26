<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdmissionSetting extends Model
{
    
    protected $table = 'admission_settings';
    protected $fillable = [
        'program_id',
        'is_open',
        'start_date',
        'end_date',
        'closure_message'
    ];

    protected $casts = [
        'is_open' => 'boolean', // Ensures strict boolean casting
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    // Restrict setting is_open to only true/false
    public function setIsOpenAttribute($value)
    {
        $this->attributes['is_open'] = filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function scopeOpen($query)
    {
        return $query->where('is_open', true)
            ->where(function($q) {
                $q->whereNull('start_date')
                  ->orWhere('start_date', '<=', now());
            })
            ->where(function($q) {
                $q->whereNull('end_date')
                  ->orWhere('end_date', '>=', now());
            });
    }
    
}