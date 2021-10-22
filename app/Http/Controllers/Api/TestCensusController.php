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
       $ward_discharges= DB::table('bed__disciplines')
  
       ->join('ward_admissions','bed__disciplines.rn','ward_admissions.reg_number')
       ->join('patients','ward_admissions.kp_passport','patients.kp_passport')         
       ->join('beds', 'beds.id', 'bed__disciplines.bed_id')
       ->join('wards','wards.id','beds.ward_id')
       ->join('disciplines','disciplines.id','bed__disciplines.discipline_id')
       ->join('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')   
       ->where('ward_discharges.date_dc', '=', $request -> datereporting)
       ->orderBy('ward_discharges.date_dc','desc')
       ->where('beds.ward_id', '=', $request -> ward_id)
  
       ->get()     
      ;
         return response()->json($ward_discharges);
   }
}
