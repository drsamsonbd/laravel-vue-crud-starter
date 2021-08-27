<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class case_reg extends Model
{
    protected $fillable = [
        'kp_passport',
        'year',
        'epid_week',
        'cumulative',
        'date_report_KKM',        
        'daily_number',
        'district',
        'locality',
        'treating_hospital'
    ];
}
