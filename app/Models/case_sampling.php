<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class case_sampling extends Model
{
    protected $fillable = [
        'kp_passport',
        'symptomatic',
        'onset',
        'screening_type',
        'exposure_type',
        'reinfection',
        'date_sample',
        'type_sample',
        'date_mka',
        'grading',
        'date_result',
        'vaccine_type',
        'first_dose_date',
        'second_dose_date',
        'notes'
    ];
}
