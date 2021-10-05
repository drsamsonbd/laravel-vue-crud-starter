<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class diagnosis extends Model
{protected $fillable = [
    'patient_reg_number',
    'diagnosis',
    'stage',
    'date_diagnosis',
    'remarks',
    'status',
];
}
