<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Models\admission as ModelsAdmission;
use App\Models\discharge;

class ChartController extends Controller
{
    public function index()
    {
        for ($i=0; $i<=14; $i++) {
            $dates[] = Carbon::now()->subDays($i)->format('Y-m-d');
         }
         
         $admissiondata = ModelsAdmission::whereIn('date', $dates)
                 ->groupBy('date')
                 ->orderBy('date', 'ASC')
                 ->get(array(
                      DB::raw('Date(date) as date'),
                      DB::raw('COUNT(*) as "count"')
                 ));
         return ( $admissiondata);
    }

    public function discharge()
    {
        for ($i=0; $i<=14; $i++) {
            $dates[] = Carbon::now()->subDays($i)->format('Y-m-d');
         }
         
         $admissiondata = discharge::whereIn('date_dc', $dates)
                 ->groupBy('date_dc')
                 ->orderBy('date_dc', 'ASC')
                 ->get(array(
                      DB::raw('Date(date_dc) as date'),
                      DB::raw('COUNT(*) as "count"')
                 ));
         return ( $admissiondata);
    }
 
}
