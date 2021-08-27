<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccination extends Model
{
    protected $fillable = [
        'date_vaccination',
        'appointment',
        'eligible',
        'aefi',
        'notes',
    ];
}
