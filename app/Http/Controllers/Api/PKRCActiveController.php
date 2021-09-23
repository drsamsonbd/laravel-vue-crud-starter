<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PKRCActiveController extends Controller

{
    
    public function index()
    {
 
    $active= DB::table('admissions')
    ->leftjoin('discharges',function($join) { $join->on('admissions.reg_number', '=', 'discharges.reg_number');
    })
    ->whereNull('discharges.reg_number')
    ->join('patients','admissions.kp_passport','patients.kp_passport')
    ->leftjoin('case_samplings','admissions.kp_passport','case_samplings.kp_passport')
   // ->leftJoin('reviews','admissions.reg_number','=','reviews.reg_number')
    
    ->select('patients.name','patients.kp_passport','patients.gender','patients.age','patients.job','patients.address','admissions.*', 'case_samplings.vaccine_type')

 //  ->select('patients.name','patients.kp_passport','patients.gender','patients.age','patients.job','patients.address','admissions.*','discharges.date_dc', 
 //  'discharges.duration', 'discharges.type_dc', 'discharges.notes','reviews.date_review'
 //  ,'reviews.reviewing_mo')
    ->orderBy('admissions.reg_number','desc')
    ->get()
    ;
       return response()->json($active);
    }

    public function show($id)
    {
        $view= DB::table('admissions')       
        ->join('patients','admissions.kp_passport','patients.kp_passport')
        ->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
       // ->leftJoin('reviews','admissions.reg_number','=','reviews.reg_number')
        ->where('admissions.id', '=', $id)
       
        ->select('patients.name','patients.kp_passport','patients.gender','patients.age','patients.job','patients.address','admissions.*')
    
     //  ->select('patients.name','patients.kp_passport','patients.gender','patients.age','patients.job','patients.address','admissions.*','discharges.date_dc', 
     //  'discharges.duration', 'discharges.type_dc', 'discharges.notes','reviews.date_review'
     //  ,'reviews.reviewing_mo')
        ->get()
        ;
        return response()->json(compact('view'));
    }

    public function showbyPKRC(Request $request)
    {   
  
        $active= DB::table('admissions')       
        ->leftjoin('discharges',function($join) { $join->on('admissions.reg_number', '=', 'discharges.reg_number');
        })
        ->whereNull('discharges.reg_number')
        ->join('patients','admissions.kp_passport','patients.kp_passport')
       // ->leftJoin('reviews','admissions.reg_number','=','reviews.reg_number')
        ->where('admissions.pkrc', '=', $request->pkrc)
       
        ->select('patients.name','patients.kp_passport','patients.gender','patients.age','patients.job','patients.address','admissions.*')
    
     //  ->select('patients.name','patients.kp_passport','patients.gender','patients.age','patients.job','patients.address','admissions.*','discharges.date_dc', 
     //  'discharges.duration', 'discharges.type_dc', 'discharges.notes','reviews.date_review'
     //  ,'reviews.reviewing_mo')
        ->orderBy('admissions.reg_number','desc')
        ->get()
        ;
        return response()->json($active);
    }

}
