<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NursingReport extends Model
{
    protected $fillable = [
    'date',
    'shift',
    'name_kj',
    'acute',
    'children',
    'female',
    'maternity',
    'male',
    'tb',
    'covid',
    'o2_conc',
    'o2_conc_occupied',
    'o2_cylinder',
    'o2_cylinder_occupied',
    'bor',
    'paeds_male',
    'paeds_female',
    'new_adm',
    'newstage_1',
    'newstage_2',
    'newstage_3',
    'newstage_4',
    'newstage_5',
    'discharged',
    'covid_discharged',
    'pending',
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
    'covid_death',
    'notes',
    'covid_adult_male',
    'covid_adult_female',
    'covid_paeds_male',
    'covid_paeds_female',
    'covid_local',
    'covid_non_local',
    'covid_step_up',
    'covid_step_down'

    ];
}
