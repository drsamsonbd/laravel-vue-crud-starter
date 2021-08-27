<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    protected $fillable = [
    'kp_passport',
'reg_number',
'date_review',
'time_review',
'diagnosis',
'warning_sign',
'temp',
'pulse',
'resp',
'bp',
'spo2',
'pre_spo2',
'post_spo2',
'reviewnotes',
'plan',
'reviewing_mo'
    ];
}
