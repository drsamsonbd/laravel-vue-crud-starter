<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
class TestCensusController extends Controller
{
 public function showbyWard(Request $request)
 {   

      
  
    $active= DB::table('beds')        
    ->where('beds.ward_id', '=', $request->ward)
    ->leftjoin('bed__disciplines','bed__disciplines.bed_id','beds.id')    
    ->select(DB::raw('max(bed__disciplines.id)'))
    ->groupBy('bed__disciplines.rn')    
    ->where('bed__disciplines.status', '=', 1)
    ->leftjoin('ward_admissions','ward_admissions.reg_number','bed__disciplines.rn')
    ->leftjoin('ward_discharges',function($join) { $join->on('ward_admissions.reg_number', '=', 'ward_discharges.reg_number');
    })
    ->whereNull('ward_discharges.reg_number')
    ->leftjoin('diagnoses','diagnoses.patient_reg_number','bed__disciplines.rn')
    ->where('diagnoses.status','=',1)
    ->leftjoin('disciplines','disciplines.id','bed__disciplines.discipline_id')
    ->join('patients','patients.kp_passport','ward_admissions.kp_passport')
    ->leftjoin('vaccination_statuses','vaccination_statuses.patient_kp_passport','patients.kp_passport')
 
 //  ->leftjoin('ward_discharges',function($join) { $join->on('ward_admissions.reg_number', '=', 'ward_discharges.reg_number');
 //  }) 
  //  ->whereNull('ward_discharges.reg_number')
   // ->leftJoin('reviews','ward_admissions.reg_number','=','reviews.reg_number')

    ->select( 'beds.*', 'bed__disciplines.rn', 'bed__disciplines.bed_id','disciplines.discipline',
    'bed__disciplines.discipline_id', 'bed__disciplines.date_bed', 
    'patients.name', 'patients.kp_passport', 'patients.age',
    'bed__disciplines.time_bed', 'ward_admissions.date', 'ward_admissions.time', 'ward_admissions.adm_diagnosis' , 'ward_admissions.adm_stage',
    'vaccination_statuses.vaccine', 'ward_discharges.date_dc')
    ->groupBy('bed__disciplines.rn')
    ->orderby('beds.id','asc')
    ->get();

    
   
     return response()->json($active);
 }
}
