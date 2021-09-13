<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LaporanHarianController extends Controller
{
    public function DewasaLelaki(Request $request)
    {
    $admission= DB::table('admissions')
    ->join('patients','admissions.kp_passport','patients.kp_passport')
    ->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
    ->where('patients.age', '>','12')
    ->where('patients.age', '<','60')
    ->where('patients.gender', '=','LELAKI')
    ->where('admissions.pkrc', '=', $request -> pkrc);

 
     $statistic =  $admission ->where('admissions.date', '<=', $request -> datereporting)

     ->where('discharges.date_dc', '>', $request -> datereporting)

     ->orWhere(function($admission )use ($request) 
     
     { 
         $admission
         ->where('patients.gender', '=','LELAKI')
         ->where('admissions.date', '<=', $request -> datereporting)
         ->where('patients.age', '>','12')
        ->where('patients.age', '<','60')
         ->where('discharges.reg_number')
         ->where('admissions.pkrc', '=', $request -> pkrc);
     })
  //  ->select('patients.name','patients.kp_passport','patients.gender','patients.age','admissions.date','admissions.adm_stage' ,
  //  'discharges.date_dc')
  //  ->get();
  ->get(array(
     DB::raw('COUNT(*) as "count"')
));
       return response()->json($statistic);
}

public function DewasaLelakiEmas(Request $request)
{
$admission= DB::table('admissions')
->join('patients','admissions.kp_passport','patients.kp_passport')
->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')

->where('patients.age', '>=','60')
->where('patients.gender', '=','LELAKI')
->where('admissions.pkrc', '=', $request -> pkrc);


 $statistic =  $admission ->where('admissions.date', '<=', $request -> datereporting)

 ->where('discharges.date_dc', '>', $request -> datereporting)

 ->orWhere(function($admission )use ($request) 
 
 { 
     $admission
     ->where('patients.gender', '=','LELAKI')
     ->where('admissions.date', '<=', $request -> datereporting)
    
    ->where('patients.age', '>=','60')
     ->where('discharges.reg_number')
     ->where('admissions.pkrc', '=', $request -> pkrc);
 })
//  ->select('patients.name','patients.kp_passport','patients.gender','patients.age','admissions.date','admissions.adm_stage' ,
//  'discharges.date_dc')
//  ->get();
->get(array(
 DB::raw('COUNT(*) as "count"')
));
   return response()->json($statistic);
}

public function DewasaPerempuan(Request $request)
{
$admission= DB::table('admissions')
->join('patients','admissions.kp_passport','patients.kp_passport')
->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
->where('patients.age', '>','12')
->where('patients.age', '<','60')
->where('patients.gender', '=','PEREMPUAN')
->where('admissions.pkrc', '=', $request -> pkrc);


 $statistic =  $admission ->where('admissions.date', '<=', $request -> datereporting)

 ->where('discharges.date_dc', '>', $request -> datereporting)

 ->orWhere(function($admission )use ($request) 
 
 { 
     $admission
     ->where('patients.gender', '=','PEREMPUAN')
     ->where('admissions.date', '<=', $request -> datereporting)
     ->where('patients.age', '>','12')
    ->where('patients.age', '<','60')
     ->where('discharges.reg_number')
     ->where('admissions.pkrc', '=', $request -> pkrc);
 })
//  ->select('patients.name','patients.kp_passport','patients.gender','patients.age','admissions.date','admissions.adm_stage' ,
//  'discharges.date_dc')
//  ->get();
->get(array(
 DB::raw('COUNT(*) as "count"')
));
   return response()->json($statistic);
}


public function DewasaPerempuanEmas(Request $request)
{
$admission= DB::table('admissions')
->join('patients','admissions.kp_passport','patients.kp_passport')
->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')

->where('patients.age', '>=','60')
->where('patients.gender', '=','PEREMPUAN')
->where('admissions.pkrc', '=', $request -> pkrc);


 $statistic =  $admission ->where('admissions.date', '<=', $request -> datereporting)

 ->where('discharges.date_dc', '>', $request -> datereporting)

 ->orWhere(function($admission )use ($request) 
 
 { 
     $admission
     ->where('patients.gender', '=','PEREMPUAN')
     ->where('admissions.date', '<=', $request -> datereporting)
     ->where('patients.age', '>=','60')
     ->where('discharges.reg_number')
     ->where('admissions.pkrc', '=', $request -> pkrc);
 })
//  ->select('patients.name','patients.kp_passport','patients.gender','patients.age','admissions.date','admissions.adm_stage' ,
//  'discharges.date_dc')
//  ->get();
->get(array(
 DB::raw('COUNT(*) as "count"')
));
   return response()->json($statistic);
}


public function KanakLelaki(Request $request)
{
$admission= DB::table('admissions')
->join('patients','admissions.kp_passport','patients.kp_passport')
->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
->where('patients.age', '<=','12')

->where('patients.gender', '=','LELAKI')
->where('admissions.pkrc', '=', $request -> pkrc);


 $statistic =  $admission ->where('admissions.date', '<=', $request -> datereporting)

 ->where('discharges.date_dc', '>', $request -> datereporting)

 ->orWhere(function($admission )use ($request) 
 
 { 
     $admission
     ->where('patients.gender', '=','LELAKI')
     ->where('admissions.date', '<=', $request -> datereporting)
     ->where('patients.age', '<=','12')
   
     ->where('discharges.reg_number')
     ->where('admissions.pkrc', '=', $request -> pkrc);
 })
//  ->select('patients.name','patients.kp_passport','patients.gender','patients.age','admissions.date','admissions.adm_stage' ,
//  'discharges.date_dc')
//  ->get();
->get(array(
 DB::raw('COUNT(*) as "count"')
));
   return response()->json($statistic);
}

public function KanakPerempuan(Request $request)
{
$admission= DB::table('admissions')
->join('patients','admissions.kp_passport','patients.kp_passport')
->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
->where('patients.age', '<=','12')

->where('patients.gender', '=','PEREMPUAN')
->where('admissions.pkrc', '=', $request -> pkrc);


 $statistic =  $admission ->where('admissions.date', '<=', $request -> datereporting)

 ->where('discharges.date_dc', '>', $request -> datereporting)

 ->orWhere(function($admission )use ($request) 
 
 { 
     $admission
     ->where('patients.gender', '=','PEREMPUAN')
     ->where('admissions.date', '<=', $request -> datereporting)
     ->where('patients.age', '<=','12')
   
     ->where('discharges.reg_number')
     ->where('admissions.pkrc', '=', $request -> pkrc);
 })
//  ->select('patients.name','patients.kp_passport','patients.gender','patients.age','admissions.date','admissions.adm_stage' ,
//  'discharges.date_dc')
//  ->get();
->get(array(
 DB::raw('COUNT(*) as "count"')
));
   return response()->json($statistic);
}

public function Lelaki(Request $request)
{
$admission= DB::table('admissions')
->join('patients','admissions.kp_passport','patients.kp_passport')
->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
->where('patients.gender', '=','LELAKI')
->where('admissions.pkrc', '=', $request -> pkrc);


 $statistic =  $admission ->where('admissions.date', '<=', $request -> datereporting)

 ->where('discharges.date_dc', '>', $request -> datereporting)

 ->orWhere(function($admission )use ($request) 
 
 { 
     $admission
     ->where('patients.gender', '=','LELAKI')
     ->where('admissions.date', '<=', $request -> datereporting)
     ->where('discharges.reg_number')
     ->where('admissions.pkrc', '=', $request -> pkrc);
 })
//  ->select('patients.name','patients.kp_passport','patients.gender','patients.age','admissions.date','admissions.adm_stage' ,
//  'discharges.date_dc')
//  ->get();
->get(array(
 DB::raw('COUNT(*) as "count"')
));
   return response()->json($statistic);
}

public function Perempuan(Request $request)
{
$admission= DB::table('admissions')
->join('patients','admissions.kp_passport','patients.kp_passport')
->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
->where('patients.gender', '=','PEREMPUAN')
->where('admissions.pkrc', '=', $request -> pkrc);


 $statistic =  $admission ->where('admissions.date', '<=', $request -> datereporting)

 ->where('discharges.date_dc', '>', $request -> datereporting)

 ->orWhere(function($admission )use ($request) 
 
 { 
     $admission
     ->where('patients.gender', '=','PEREMPUAN')
     ->where('admissions.date', '<=', $request -> datereporting)
     ->where('discharges.reg_number')
     ->where('admissions.pkrc', '=', $request -> pkrc);
 })
//  ->select('patients.name','patients.kp_passport','patients.gender','patients.age','admissions.date','admissions.adm_stage' ,
//  'discharges.date_dc')
//  ->get();
->get(array(
 DB::raw('COUNT(*) as "count"')
));
   return response()->json($statistic);
}

public function JumlahHarian(Request $request)
{
$admission= DB::table('admissions')
->join('patients','admissions.kp_passport','patients.kp_passport')
->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')

->where('admissions.pkrc', '=', $request -> pkrc);


 $statistic =  $admission ->where('admissions.date', '<=', $request -> datereporting)

 ->where('discharges.date_dc', '>', $request -> datereporting)

 ->orWhere(function($admission )use ($request) 
 
 { 
     $admission
    
     ->where('admissions.date', '<=', $request -> datereporting)
     ->where('discharges.reg_number')
     ->where('admissions.pkrc', '=', $request -> pkrc);
 })
//  ->select('patients.name','patients.kp_passport','patients.gender','patients.age','admissions.date','admissions.adm_stage' ,
//  'discharges.date_dc')
//  ->get();
->get(array(
 DB::raw('COUNT(*) as "count"')
));
   return response()->json($statistic);
}

public function Jumlah(Request $request)
{
$admission= DB::table('admissions')
->where('admissions.pkrc', '=', $request -> pkrc);

 $statistic =  $admission ->where('admissions.date', '<=', $request -> datereporting)

//  ->select('patients.name','patients.kp_passport','patients.gender','patients.age','admissions.date','admissions.adm_stage' ,
//  'discharges.date_dc')
//  ->get();
->get(array(
 DB::raw('COUNT(*) as "count"')
));
   return response()->json($statistic);
}

public function Discharges(Request $request)
{
$admission= DB::table('admissions')
->join('discharges','admissions.reg_number','=','discharges.reg_number')

->where('admissions.pkrc', '=', $request -> pkrc);

 $statistic =  $admission ->where('admissions.date', '<=', $request -> datereporting)


//  ->select('patients.name','patients.kp_passport','patients.gender','patients.age','admissions.date','admissions.adm_stage' ,
//  'discharges.date_dc')
//  ->get();
->get(array(
 DB::raw('COUNT(*) as "count"')
));
   return response()->json($statistic);
}


public function StepUp(Request $request)
{
$admission= DB::table('admissions')
->join('discharges','admissions.reg_number','=','discharges.reg_number')

->where('admissions.pkrc', '=', $request -> pkrc)
->where('discharges.type_dc', '=', 'Ditukar ke Hospital Lain');
 $statistic =  $admission ->where('admissions.date', '<=', $request -> datereporting)


//  ->select('patients.name','patients.kp_passport','patients.gender','patients.age','admissions.date','admissions.adm_stage' ,
//  'discharges.date_dc')
//  ->get();
->get(array(
 DB::raw('COUNT(*) as "count"')
));
   return response()->json($statistic);
}
}