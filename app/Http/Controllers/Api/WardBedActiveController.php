<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\Models\bed;
class WardBedActiveController extends Controller

{

  public function index()
    {   
  
        $active= DB::table('beds')        

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
        'bed__disciplines.time_bed', 'ward_admissions.date', 'ward_admissions.time',    DB::raw('(diagnoses.id) AS Did'), 
        'diagnoses.diagnosis',
        'diagnoses.stage',
        'vaccination_statuses.vaccine', 'ward_discharges.date_dc')
      //  ->select('beds.*','patients.name','patients.kp_passport','patients.gender','patients.age','patients.job','patients.address','ward_admissions.*')
    
     //  ->select('patients.name','patients.kp_passport','patients.gender','patients.age','patients.job','patients.address','ward_admissions.*','ward_discharges.date_dc', 
     //  'ward_discharges.duration', 'ward_discharges.type_dc', 'ward_discharges.notes','reviews.date_review'
     //  ,'reviews.reviewing_mo')
      //  ->orderBy('ward_admissions.reg_number','desc')

      ->groupBy('beds.id')
      ->orderby('beds.id','asc')
      ->orderby('bed__disciplines.id','desc')
      ->get();
        
        return response()->json($active);
    }

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

    
    public function count(Request $request)
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

      $count=$active->count();

     
      
        return response()->json($count);
    }
}

