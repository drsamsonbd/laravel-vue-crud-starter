<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class getCensusController extends Controller
{
    public function index(Request $request)
    {
//total_male
         $datatable= DB::table('ward_admissions')
         ->join('patients','ward_admissions.kp_passport','patients.kp_passport')         
         ->join('bed__disciplines','bed__disciplines.rn','ward_admissions.reg_number')
         ->join('beds', 'beds.id', 'bed__disciplines.bed_id')
         ->join('wards','wards.id','beds.ward_id')
         ->join('disciplines','disciplines.id','bed__disciplines.discipline_id')
         ->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number');
        

      
         $stat_kelmarin_total_male =  $datatable ->where('ward_admissions.date', '<', $request -> datereporting)
         ->where('ward_discharges.date_dc', '>', $request -> datereporting)
         ->where('beds.ward_id', '=', $request -> ward_id)
         ->where('patients.age', '>','12')
         ->where('patients.gender', '=','Lelaki')

         ->orWhere(function($datatable )use ($request) 
         
         { 
               $datatable
               ->where('patients.gender', '=','Lelaki')
               ->where('ward_admissions.date', '<', $request -> datereporting)
               ->where('patients.age', '>','12')    
               ->where('beds.ward_id', '=', $request -> ward_id)
               ->where('ward_discharges.reg_number');
         });

      $kelmarin_total_male = $stat_kelmarin_total_male ->count();

//total_female
    
      $stat_kelmarin_total_female =  $datatable 
      ->where('patients.gender', '=','Perempuan')
      ->where('ward_admissions.date', '<', $request -> datereporting)
      ->where('ward_discharges.date_dc', '>', $request -> datereporting)
      ->where('patients.age', '>','12')
      ->where('beds.ward_id', '=', $request -> ward_id)
      
      ->orWhere(function($datatable )use ($request) 
      
      { 
            $datatable
            ->where('patients.gender', '=','Perempuan')
            ->where('ward_admissions.date', '<', $request -> datereporting)
            ->where('patients.age', '>','12')    
            ->where('beds.ward_id', '=', $request -> ward_id)
            ->where('ward_discharges.reg_number')
            ;
      })

 ->  get();



//total_total
    
$stat_kelmarin_total_total =  $datatable ->where('ward_admissions.date', '<=', $request -> datereporting)
->where('ward_discharges.date_dc', '>', $request -> datereporting)
->where('patients.age', '>','12')
->where('beds.ward_id', '=', $request -> ward_id)

->orWhere(function($datatable )use ($request) 

{ 
      $datatable
      ->where('ward_admissions.date', '<=', $request -> datereporting)
      ->where('patients.age', '>','12')    
      ->where('beds.ward_id', '=', $request -> ward_id)
      ->where('ward_discharges.reg_number');
});

$kelmarin_total_total = $stat_kelmarin_total_total ->count();



      return response()->json( compact('kelmarin_total_male','stat_kelmarin_total_female','kelmarin_total_total'
     ));
   }
}
