<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaccinationStatus extends Model
{
    protected $fillable = [
        'patient_kp_passport',
        'vaccine',
        'date_first',
        'date_second',
        'remarks',
    ];
}
