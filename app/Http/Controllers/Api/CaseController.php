<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CaseController extends Controller
{
    public function index()
    {
        $case= DB::table('patients')
       ->join('case_regs','patients.kp_passport','case_regs.kp_passport')
      // ->join('case_samplings','patients.kp_passport','case_samplings.kp_passport')
      // ->select('patients.*','case_regs.*','case_samplings.*')
      ->select('patients.name','case_regs.*')
       ->orderBy('case_regs.cumulative','desc')
       ->get()
       ;
          return response()->json($case);
    }

    public function show($id)
    {
        $case= DB::table('case_regs')->where('case_regs.id',$id)
       ->join('patients','patients.kp_passport','case_regs.kp_passport')
       //->join('case_samplings','patients.kp_passport','case_samplings.kp_passport')
      // ->select('patients.*','case_regs.*','case_samplings.*')
      ->select('patients.name','case_regs.*')
     
       ->get()
       ;
          return response()->json($case);
    }
}
