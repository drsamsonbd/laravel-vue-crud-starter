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

 
  
    $active= bed::where('ward_id',$request->ward )      
    
    ->leftjoin('bed__disciplines',function($join) { $join->on('beds.id', '=', 'bed__disciplines.bed_id') ->where('bed__disciplines.status', '=', 1);
    })       
    ->leftjoin('ward_admissions','ward_admissions.reg_number','bed__disciplines.rn')
    ->leftJoin('wards', 'wards.id','beds.ward_id')
    ->leftJoin('departments', 'departments.id', 'wards.team_id')
    ->leftjoin('disciplines','disciplines.id','bed__disciplines.discipline_id')

   
    ->leftjoin('diagnoses', function ($join){ $join->on('diagnoses.patient_reg_number','=','bed__disciplines.rn')
    ->where('diagnoses.status','=',1);})
    ->leftjoin('patients','patients.kp_passport','ward_admissions.kp_passport')
    ->leftjoin('vaccination_statuses','vaccination_statuses.patient_kp_passport','patients.kp_passport')

      
    ->select( 'beds.*', 'bed__disciplines.rn', DB::raw('(bed__disciplines.id) AS BDid'), 'wards.team_id',
    'bed__disciplines.discipline_id', 'bed__disciplines.date_bed',  'bed__disciplines.status', 'disciplines.discipline',
    'patients.name', 'patients.kp_passport', 'patients.age',
    'bed__disciplines.time_bed', 'ward_admissions.date', 'ward_admissions.time',    DB::raw('(diagnoses.id) AS Did'), 
    'diagnoses.diagnosis',
    'diagnoses.stage',
    'vaccination_statuses.vaccine')

  ->groupBy('beds.id')
  ->orderby('beds.id','asc')
  ->orderby('bed__disciplines.id','desc')
 
  ->get();
     return response()->json($active);
 }
}
