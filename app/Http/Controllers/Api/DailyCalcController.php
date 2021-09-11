<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\admission as ModelsAdmission;
use App\Models\case_reg;

class DailyCalcController extends Controller
{
    public function CovidMale(Request $request)
    {
        $admission= DB::table('admissions')
       ->join('patients','admissions.kp_passport','patients.kp_passport')
       ->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
       ->leftJoin('reviews','admissions.reg_number','=','reviews.reg_number')
       ->where('admissions.pkrc', '=', $request->pkrc)
       ->where('admissions.date', '>=', $request->datereporting)
       ->where('discharges.date_dc', '<', $request->datereporting)
       ->where('patients.gender', '=','LELAKI')
       ->orWhere('patients.gender', '=','L')    
       ->get(array(
        DB::raw('COUNT(*) as "count"')
   ));
       ;
          return response()->json($admission);
    }
}
