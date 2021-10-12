<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\bed;

class TestCensusController extends Controller
{
 public function showbyWard(Request $request)
 {   
//total_female

$transfer= DB::table('bed__disciplines')
->join('beds', 'beds.id', 'bed__disciplines.bed_id')
->join('wards','wards.id','beds.ward_id')
->join('disciplines','disciplines.id','bed__disciplines.discipline_id')
->join('ward_admissions', 'ward_admissions.reg_number','bed__disciplines.rn' )
->join('patients','patients.kp_passport', 'ward_admissions.kp_passport' );

$transfer_discipline_total_male  = $transfer ->where([['bed__disciplines.date_bed', '=', $request -> datereporting],['bed__disciplines.status', '=','UPDATE DISCIPLINE']])
->where('beds.ward_id', '=', $request -> ward_id)  ->where('patients.gender','=','Lelaki')->get();

     return response()->json(compact('transfer_discipline_total_male'));
 }
}
