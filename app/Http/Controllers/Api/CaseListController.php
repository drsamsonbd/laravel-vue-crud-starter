<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class CaseListController extends Controller

{
    public function index()
    {

        $case= DB::table('patients')
       ->leftjoin('case_regs','patients.kp_passport','case_regs.kp_passport')
      ->leftjoin('case_samplings','patients.kp_passport','case_samplings.kp_passport')
        
    
      ->select('patients.*','case_regs.*','case_samplings.*')
      ->select('patients.*','case_regs.*','case_samplings.*')
      ->where('case_regs.date_report_KKM','>=',Carbon::now()->subdays(14))
                   ->get() ;
          return response()->json($case);
    }

    public function show($id)
    {
        $case= DB::table('case_regs')->where('patients.id',$id)
       ->join('patients','patients.kp_passport','case_regs.kp_passport')
       ->join('case_samplings','patients.kp_passport','case_samplings.kp_passport')
      ->select('patients.*','case_regs.*','case_samplings.*')
      ->select('patients.*','case_regs.*')
     
       ->get()
       ;
          return response()->json($case);
    }
}
