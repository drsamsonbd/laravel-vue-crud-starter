<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class WardActiveController extends Controller
{
    public function index()
    {
    $active= DB::table('ward_admissions')
    ->leftjoin('ward_discharges',function($join) { $join->on('ward_admissions.reg_number', '=', 'ward_discharges.reg_number');
    })
    ->whereNull('ward_discharges.reg_number')
    ->join('patients','ward_admissions.kp_passport','patients.kp_passport')
    ->leftjoin('case_samplings','ward_admissions.kp_passport','case_samplings.kp_passport')
   // ->leftJoin('reviews','ward_admissions.reg_number','=','reviews.reg_number')
    
    ->select('patients.name','patients.kp_passport','patients.gender','patients.age','patients.job','patients.address','ward_admissions.*', 'case_samplings.vaccine_type')

 //  ->select('patients.name','patients.kp_passport','patients.gender','patients.age','patients.job','patients.address','ward_admissions.*','ward_discharges.date_dc', 
 //  'ward_discharges.duration', 'ward_discharges.type_dc', 'ward_discharges.notes','reviews.date_review'
 //  ,'reviews.reviewing_mo')
    ->orderBy('ward_admissions.reg_number','desc')
    ->get()
    ;
       return response()->json($active);
    }

    public function show($id)
    {
        $view= DB::table('ward_admissions')       
        ->join('patients','ward_admissions.kp_passport','patients.kp_passport')
        ->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')
       // ->leftJoin('reviews','ward_admissions.reg_number','=','reviews.reg_number')
        ->where('ward_admissions.id', '=', $id)
       
        ->select('patients.name','patients.kp_passport','patients.gender','patients.age','patients.job','patients.address','ward_admissions.*')
    
     //  ->select('patients.name','patients.kp_passport','patients.gender','patients.age','patients.job','patients.address','ward_admissions.*','ward_discharges.date_dc', 
     //  'ward_discharges.duration', 'ward_discharges.type_dc', 'ward_discharges.notes','reviews.date_review'
     //  ,'reviews.reviewing_mo')
        ->get()
        ;
        return response()->json(compact('view'));
    }

    public function showbyWard(Request $request)
    {   
  
        $active= DB::table('ward_admissions')       
        ->leftjoin('ward_discharges',function($join) { $join->on('ward_admissions.reg_number', '=', 'ward_discharges.reg_number');
        })
        ->whereNull('ward_discharges.reg_number')
        ->join('patients','ward_admissions.kp_passport','patients.kp_passport')
       // ->leftJoin('reviews','ward_admissions.reg_number','=','reviews.reg_number')
        ->where('ward_admissions.ward', '=', $request->ward)
       
        ->select('patients.name','patients.kp_passport','patients.gender','patients.age','patients.job','patients.address','ward_admissions.*')
    
     //  ->select('patients.name','patients.kp_passport','patients.gender','patients.age','patients.job','patients.address','ward_admissions.*','ward_discharges.date_dc', 
     //  'ward_discharges.duration', 'ward_discharges.type_dc', 'ward_discharges.notes','reviews.date_review'
     //  ,'reviews.reviewing_mo')
        ->orderBy('ward_admissions.reg_number','desc')
        ->get()
        ;
        return response()->json($active);
    }
}
