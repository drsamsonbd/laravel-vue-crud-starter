<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\admission;
use App\Models\admission as ModelsAdmission;

class ChartController extends Controller
{
    public function index()
    {
        for ($i=0; $i<=30; $i++) {
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
 
}
