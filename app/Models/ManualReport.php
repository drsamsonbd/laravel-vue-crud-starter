<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManualReport extends Model
{
    protected $fillable = [
        'date', 
        'time', 
        'pkrc', 
        'male', 
        'female', 
        'paeds_male', 
        'paeds_female', 
        'new_adm', 
        'step_up', 
        'discharged', 
        'home_q', 
        'pending', 
        'carer', 
        'local', 
        'non_local', 
        'bor', 
        'stage_1', 
        'stage_2', 
        'stage_3', 
        'stage_4', 
        'stage_5', 
        'stage_1_1', 
        'stage_1_2', 
        'stage_2_1', 
        'stage_2_2', 
        'stage_3_1', 
        'stage_3_2', 
        'stage_4_1', 
        'stage_4_2', 
        'stage_5_1', 
        'stage_5_2', 
        'staff', 
        'pui_adult_male', 
        'pui_adult_female', 
        'pui_paeds_male', 
        'pui_paeds_female', 
        'pui_new', 
        'pui_discharged', 
        'pui_death', 
        'notes', 

    ];
}
