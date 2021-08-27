<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DischargeRecordController extends Controller
{
    public function index()
    {
    $discharges= DB::table('discharges')
    ->join('admissions','admissions.reg_number','discharges.reg_number')
    ->join('patients','patients.kp_passport','admissions.kp_passport')
    ->select('patients.name','admissions.*','discharges.*')
    ->orderBy('discharges.reg_number','desc')
    ->get()
    ;
       return response()->json($discharges);
 }

 public function show($id)
 {
     $discharges= DB::table('admissions')->where('admissions.id',$id)
     ->join('patients','patients.kp_passport','admissions.kp_passport')
     // ->join('case_samplings','patients.kp_passport','case_samplings.kp_passport')
     // ->select('patients.*','case_regs.*','case_samplings.*')
     ->select('patients.name','patients.phone','admissions.*')
     ->orderBy('admissions.date','desc')
     ->get()     
    ;
       return response()->json($discharges);
 }
}
