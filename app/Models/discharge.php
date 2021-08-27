<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class discharge extends Model
{
    protected $fillable = [
    'kp_passport',
    'reg_number',
    'date_dc',
    'duration',
    'type_dc',
    'notes'
        ];
    }
