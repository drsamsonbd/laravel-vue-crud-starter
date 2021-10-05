<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bed_Discipline extends Model
{
    protected $fillable = [
    'rn', 
    'date_bed',
    'time_bed',
    'bed_id', 
    'discipline_id', 
    'remarks', 
    ];

}

