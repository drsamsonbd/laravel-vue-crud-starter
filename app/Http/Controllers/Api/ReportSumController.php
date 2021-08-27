<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ManualReport;

use Illuminate\Support\Facades\DB;

class ReportSumController extends Controller
{
    public function show($id)
  {
    $ManualReport = DB::table('manual_reports')->where('id',$id)
 
    ->sum('male', 'female','paeds_male','paeds_female');

    
  }

}
