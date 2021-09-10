<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\admission as ModelsAdmission;
use App\Models\case_reg;

class StatisticsController extends Controller
{
    public function BW()
    {
        $case= DB::table('case_regs')
        ->where('date_report_KKM','>=',Carbon::now()->subdays(7))
        ->where('district','=','BELURAN')
        ->get(array(
            DB::raw('COUNT(*) as "count"')
       ));
          return response()->json($case);
    }

    public function BD()
    {
        $case= DB::table('case_regs')
        ->where('date_report_KKM','>=',Carbon::now())
        ->where('district','=','BELURAN')
        ->get(array(
            DB::raw('COUNT(*) as "count"')
       ));
          return response()->json($case);
    }

    public function BBW()
    {
        $case= DB::table('case_regs')
        ->where('date_report_KKM','>=',Carbon::now()->subdays(14))
        ->where('district','=','BELURAN')
        ->get(array(
            DB::raw('COUNT(*) as "count"')
       ));
          return response()->json($case);
    }

    public function BC()
    {
        $case= case_reg::where( 'district', 'BELURAN')->max('cumulative');
          return response()->json($case);
    }


    public function TW()
    {
        $case= DB::table('case_regs')
        ->where('date_report_KKM','>=',Carbon::now()->subdays(7))
        ->where('district','=','TELUPID')
        ->get(array(
            DB::raw('COUNT(*) as "count"')
       ));
          return response()->json($case);
    }

    public function TD()
    {
        $case= DB::table('case_regs')
        ->where('date_report_KKM','>=',Carbon::now())
        ->where('district','=','TELUPID')
        ->get(array(
            DB::raw('COUNT(*) as "count"')
       ));
          return response()->json($case);
    }

    public function TBW()
    {
        $case= DB::table('case_regs')
        ->where('date_report_KKM','>=',Carbon::now()->subdays(14))
        ->where('district','=','TELUPID')
        ->get(array(
            DB::raw('COUNT(*) as "count"')
       ));
          return response()->json($case);
    }

    public function TM()
    {
        $case= DB::table('case_regs')
        ->where('date_report_KKM','>=',Carbon::now()->subdays(30))
        ->where('district','=','TELUPID')
        ->get(array(
            DB::raw('COUNT(*) as "count"')
       ));
          return response()->json($case);
    }
}
