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
      $datatable= DB::table('bed__disciplines')

      ->join('ward_admissions','bed__disciplines.rn','ward_admissions.reg_number')
      ->join('patients','ward_admissions.kp_passport','patients.kp_passport')         
      ->join('beds', 'beds.id', 'bed__disciplines.bed_id')
      ->join('wards','wards.id','beds.ward_id')
      ->join('disciplines','disciplines.id','bed__disciplines.discipline_id')
      ->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')   
      ->where('patients.gender', '=','Perempuan');  
      
      
      $stat_kelmarin_total_female =  $datatable 
      ->where([['bed__disciplines.remarks', '=','New'],
      ['bed__disciplines.date_bed', '<', $request -> datereporting]])
      ->where('beds.ward_id', '=', $request -> ward_id)
      ->where('ward_discharges.date_dc', '>=', $request -> datereporting)

      
      ->where('patients.gender', '=','Perempuan')
      ->orWhere(function($datatable )use ($request) 
      
      { 
            $datatable
            ->where('patients.gender', '=','Perempuan')         
            ->where([['bed__disciplines.remarks', '=','New'],
            ['bed__disciplines.date_bed', '<', $request -> datereporting]])            
            ->where('beds.ward_id', '=', $request -> ward_id)
            ->where('ward_discharges.reg_number');
      });
      
      $count_kelmarin_total_female = $stat_kelmarin_total_female -> get();

      
      
      
         return response()->json($count_kelmarin_total_female );
   }
}
