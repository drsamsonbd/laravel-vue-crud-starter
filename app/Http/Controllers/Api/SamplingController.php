<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
class SamplingController extends Controller
{
    public function index()
    {
        $case= DB::table('patients')
       
      ->join('case_samplings','patients.kp_passport','case_samplings.kp_passport')
      ->select('patients.*','case_samplings.*')
      
       ->orderBy('patients.name','asc')
       ->get()
       ;
          return response()->json($case);
    }

    public function show($id)
    {
        $case= DB::table('patients')->where('patients.id',$id)
       ->join('case_samplings','patients.kp_passport','case_samplings.kp_passport')
       ->select('patients.*','case_samplings.*')
       ->orderBy('patients.name','asc')
       ->get()
       ;
          return response()->json($case);
    }
}
