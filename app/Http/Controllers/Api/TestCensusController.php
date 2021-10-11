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

$discharges_pkrc= DB::table('discharges')
->join('admissions','admissions.reg_number','discharges.reg_number')
->join('patients', 'patients.kp_passport','discharges.kp_passport');

$balik_adult_male_pkrc = $discharges_pkrc ->where([['discharges.date_dc', '=', $request -> datereporting],['discharges.type_dc', '=','Balik ke Rumah']])
                                     ->where([['patients.gender','=','Perempuan'],['patients.age','>', 12 ]]) 
                                    ->count() ;





     return response()->json(compact('balik_adult_male_pkrc'));
 }
}
