<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WardDischargesRecordController extends Controller
{
    public function index()
    {
    $ward_discharges= DB::table('ward_discharges')
    ->join('ward_admissions','ward_admissions.reg_number','ward_discharges.reg_number')
    ->join('patients','patients.kp_passport','ward_admissions.kp_passport')
    ->select('patients.name','ward_admissions.*','ward_discharges.*')
    ->orderBy('ward_discharges.reg_number','desc')
    ->get()
    ;
       return response()->json($ward_discharges);
 }

 public function show($id)
 {
     $ward_discharges= DB::table('ward_admissions')->where('ward_admissions.id',$id)
     ->join('patients','patients.kp_passport','ward_admissions.kp_passport')
     // ->join('case_samplings','patients.kp_passport','case_samplings.kp_passport')
     // ->select('patients.*','case_regs.*','case_samplings.*')
     ->select('patients.name','patients.phone','ward_admissions.*')
     ->orderBy('ward_admissions.date','desc')
     ->get()     
    ;
       return response()->json($ward_discharges);
 }

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
     ->groupby('ward_admissions.reg_number')
     ->orderBy('ward_discharges.date_dc','desc')
     ->where('beds.ward_id', '=', $request -> ward_id)

     ->get()     
    ;
       return response()->json($ward_discharges);
 }
}
