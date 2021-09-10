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
        ->where('date_report_KKM','=',Carbon::today())
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
        $case=DB::table('case_regs')  
       
        ->where( 'district','=', 'BELURAN')
        ->select('case_regs.cumulative')->max('cumulative');

     
          return ($case);
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
        ->where('date_report_KKM','=',Carbon::today())
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

    public function TC()
    {
        $case= case_reg::where( 'district', 'TELUPID')->max('cumulative');
        return response()->json($case);
    }

    public function PKRCActive()
    {
        $case= case_reg::where( 'district', 'TELUPID')->max('cumulative');
        return response()->json($case);
    }
}
