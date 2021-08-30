<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\case_reg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdmissionRecordController extends Controller
{
    public function index()
    {
        $admission= DB::table('admissions')
       ->join('patients','admissions.kp_passport','patients.kp_passport')
       ->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
       ->leftJoin('reviews','admissions.reg_number','=','reviews.reg_number')
       
       ->select('patients.name','patients.kp_passport','patients.gender','patients.age','patients.job','patients.address','admissions.*','discharges.date_dc', 
       'discharges.duration', 'discharges.type_dc', 'discharges.notes','reviews.date_review'
       ,'reviews.reviewing_mo')
       ->orderBy('admissions.reg_number','desc')
       ->get()
       ;
          return response()->json($admission);
    }

    public function show($id)
    {
        $admission= DB::table('admissions')->where('admissions.id',$id)
        ->leftjoin('patients','patients.kp_passport','admissions.kp_passport')
        ->leftjoin('case_regs','patients.kp_passport','case_regs.kp_passport')
        ->leftjoin('case_samplings','patients.kp_passport','case_samplings.kp_passport')
        ->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
       ->leftJoin('reviews','admissions.reg_number','=','reviews.reg_number')
       ->select('patients.*','admissions.*','discharges.id',
       'discharges.*','reviews.date_review'
       ,'reviews.reviewing_mo')     
        ->get()     
       ;
          return response()->json($admission);
    }

    public function kp_passport($id)
    {
        $admission= DB::table('admissions')->where('admissions.kp_passport',$id)
        ->join('patients','patients.kp_passport','admissions.kp_passport')
        // ->join('case_samplings','patients.kp_passport','case_samplings.kp_passport')
        // ->select('patients.*','case_regs.*','case_samplings.*')
        ->select('patients.name')
   
        ->get()     
       ;
          return response()->json($admission);
    }
}
