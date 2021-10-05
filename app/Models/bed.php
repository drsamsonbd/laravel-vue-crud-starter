<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bed extends Model
{
    protected $fillable = [
    'ward_id',
    'bed_number',
    'bed_code',
    'bed_class',
    'notes',
    ];
}
