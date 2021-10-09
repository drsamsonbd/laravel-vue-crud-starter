<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
class TestCensusController extends Controller
{
    public function index(Request $request)
    {
        $data_transfer= DB::table('bed__disciplines')

        ->join('ward_admissions','bed__disciplines.rn','ward_admissions.reg_number')
        ->join('patients','ward_admissions.kp_passport','patients.kp_passport')         
        ->join('beds', 'beds.id', 'bed__disciplines.bed_id')
        ->join('wards','wards.id','beds.ward_id')
        ->join('disciplines','disciplines.id','bed__disciplines.discipline_id')
        ->where('patients.age', '>','12')
        ->where('patients.gender', '=','Lelaki');
        
        $stat_admission_total_male =  $data_transfer->where([['bed__disciplines.remarks', '=','New'],
        ['bed__disciplines.date_bed', '=', $request -> datereporting]]);
        
        
        $admission_adult_total_male=  $stat_admission_total_male ->count();
      return response()->json( compact('admission_adult_total_male'
     ));
   }
}
