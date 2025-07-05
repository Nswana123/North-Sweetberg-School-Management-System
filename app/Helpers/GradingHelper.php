<?php
namespace App\Helpers;

use App\Models\GradingSetting;

class GradingHelper
{
    public static function assignGrade($mark)
    {
        return GradingSetting::where('min', '<=', $mark)
                              ->where('max', '>=', $mark)
                              ->first();
    }
}