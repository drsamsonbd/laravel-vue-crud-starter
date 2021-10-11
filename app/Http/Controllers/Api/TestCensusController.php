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

    $admission= DB::table('admissions')
    ->join('patients','admissions.kp_passport','patients.kp_passport')
    ->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
    ->where('patients.age', '>','12')
    ->where('patients.gender', '=','Perempuan');
    
     $statistic_adult_pkrc =  $admission ->where('admissions.date', '<', $request -> datereporting)
     ->where('discharges.date_dc', '>', $request -> datereporting)
     ->orWhere(function($admission )use ($request)  
     { 
         $admission
         ->where('patients.gender', '=','Perempuan')
         ->where('admissions.date', '<', $request -> datereporting)
         ->where('discharges.reg_number')
         ->where('patients.age', '>','12');
     });
    $kelmarin_adult_pkrc = $statistic_adult_pkrc->count();
     return response()->json($kelmarin_adult_pkrc);
 }
}
