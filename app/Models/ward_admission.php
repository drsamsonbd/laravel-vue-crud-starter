<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ward_admission extends Model
{
    protected $fillable = [
        'reg_number',
        'kp_passport',
        'ward',
        'marriage',
        'religion',
        'kin',
        'kin_address',
        'kin_relation',
        'kin_phone',
        'date',
        'time',
        'weight',
        'note',
        'adm_diagnosis',
        'adm_stage',

    ];
}
