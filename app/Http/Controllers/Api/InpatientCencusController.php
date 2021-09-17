<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InpatientCencusController extends Controller
{
    public function index(Request $request)
    {
    $DLadmission= DB::table('ward_admissions')
    ->join('patients','ward_admissions.kp_passport','patients.kp_passport')
    ->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')
    ->where('patients.age', '>','12')
    ->where('patients.age', '<','60')
    ->where('patients.gender', '=','LELAKI');

 
     $DLstatistic =  $DLadmission ->where('ward_admissions.date', '<=', $request -> datereporting)

     ->where('ward_discharges.date_dc', '>', $request -> datereporting)

     ->orWhere(function($DLadmission )use ($request) 
     
     { 
         $DLadmission
         ->where('patients.gender', '=','LELAKI')
         ->where('ward_admissions.date', '<=', $request -> datereporting)
         ->where('patients.age', '>','12')
        ->where('patients.age', '<','60')
         ->where('ward_discharges.reg_number');
     })
  //  ->select('patients.name','patients.kp_passport','patients.gender','patients.age','ward_admissions.date','ward_admissions.adm_stage' ,
  //  'ward_discharges.date_dc')
  //  ->get();
  ->get(array(
     DB::raw('COUNT(*) as "count"')
));


$DLCadmission= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')

->where('patients.age', '>=','60')
->where('patients.gender', '=','LELAKI');


 $DLCstatistic =  $DLCadmission ->where('ward_admissions.date', '<=', $request -> datereporting)

 ->where('ward_discharges.date_dc', '>', $request -> datereporting)

 ->orWhere(function($DLCadmission )use ($request) 
 
 { 
     $DLCadmission
     ->where('patients.gender', '=','LELAKI')
     ->where('ward_admissions.date', '<=', $request -> datereporting)
    
    ->where('patients.age', '>=','60')
     ->where('ward_discharges.reg_number');
 })
//  ->select('patients.name','patients.kp_passport','patients.gender','patients.age','ward_admissions.date','ward_admissions.adm_stage' ,
//  'ward_discharges.date_dc')
//  ->get();
->get(array(
 DB::raw('COUNT(*) as "count"')
));
   return response()->json( compact('DLCstatistic', 'DLstatistic'));
}

public function DewasaPerempuan(Request $request)
{
$admission= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')
->where('patients.age', '>','12')
->where('patients.age', '<','60')
->where('patients.gender', '=','PEREMPUAN')
->where('ward_admissions.ward', '=', $request -> ward);


 $statistic =  $admission ->where('ward_admissions.date', '<=', $request -> datereporting)

 ->where('ward_discharges.date_dc', '>', $request -> datereporting)

 ->orWhere(function($admission )use ($request) 
 
 { 
     $admission
     ->where('patients.gender', '=','PEREMPUAN')
     ->where('ward_admissions.date', '<=', $request -> datereporting)
     ->where('patients.age', '>','12')
    ->where('patients.age', '<','60')
     ->where('ward_discharges.reg_number')
     ->where('ward_admissions.ward', '=', $request -> ward);
 })
//  ->select('patients.name','patients.kp_passport','patients.gender','patients.age','ward_admissions.date','ward_admissions.adm_stage' ,
//  'ward_discharges.date_dc')
//  ->get();
->get(array(
 DB::raw('COUNT(*) as "count"')
));
   return response()->json($statistic);
}


public function DewasaPerempuanEmas(Request $request)
{
$admission= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')

->where('patients.age', '>=','60')
->where('patients.gender', '=','PEREMPUAN')
->where('ward_admissions.ward', '=', $request -> ward);


 $statistic =  $admission ->where('ward_admissions.date', '<=', $request -> datereporting)

 ->where('ward_discharges.date_dc', '>', $request -> datereporting)

 ->orWhere(function($admission )use ($request) 
 
 { 
     $admission
     ->where('patients.gender', '=','PEREMPUAN')
     ->where('ward_admissions.date', '<=', $request -> datereporting)
     ->where('patients.age', '>=','60')
     ->where('ward_discharges.reg_number')
     ->where('ward_admissions.ward', '=', $request -> ward);
 })
//  ->select('patients.name','patients.kp_passport','patients.gender','patients.age','ward_admissions.date','ward_admissions.adm_stage' ,
//  'ward_discharges.date_dc')
//  ->get();
->get(array(
 DB::raw('COUNT(*) as "count"')
));
   return response()->json($statistic);
}


public function KanakLelaki(Request $request)
{
$admission= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')
->where('patients.age', '<=','12')

->where('patients.gender', '=','LELAKI')
->where('ward_admissions.ward', '=', $request -> ward);


 $statistic =  $admission ->where('ward_admissions.date', '<=', $request -> datereporting)

 ->where('ward_discharges.date_dc', '>', $request -> datereporting)

 ->orWhere(function($admission )use ($request) 
 
 { 
     $admission
     ->where('patients.gender', '=','LELAKI')
     ->where('ward_admissions.date', '<=', $request -> datereporting)
     ->where('patients.age', '<=','12')
   
     ->where('ward_discharges.reg_number')
     ->where('ward_admissions.ward', '=', $request -> ward);
 })
//  ->select('patients.name','patients.kp_passport','patients.gender','patients.age','ward_admissions.date','ward_admissions.adm_stage' ,
//  'ward_discharges.date_dc')
//  ->get();
->get(array(
 DB::raw('COUNT(*) as "count"')
));
   return response()->json($statistic);
}

public function KanakPerempuan(Request $request)
{
$admission= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')
->where('patients.age', '<=','12')

->where('patients.gender', '=','PEREMPUAN')
->where('ward_admissions.ward', '=', $request -> ward);


 $statistic =  $admission ->where('ward_admissions.date', '<=', $request -> datereporting)

 ->where('ward_discharges.date_dc', '>', $request -> datereporting)

 ->orWhere(function($admission )use ($request) 
 
 { 
     $admission
     ->where('patients.gender', '=','PEREMPUAN')
     ->where('ward_admissions.date', '<=', $request -> datereporting)
     ->where('patients.age', '<=','12')
   
     ->where('ward_discharges.reg_number')
     ->where('ward_admissions.ward', '=', $request -> ward);
 })
//  ->select('patients.name','patients.kp_passport','patients.gender','patients.age','ward_admissions.date','ward_admissions.adm_stage' ,
//  'ward_discharges.date_dc')
//  ->get();
->get(array(
 DB::raw('COUNT(*) as "count"')
));
   return response()->json($statistic);
}

public function Lelaki(Request $request)
{
$admission= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')
->where('patients.gender', '=','LELAKI')
->where('ward_admissions.ward', '=', $request -> ward);


 $statistic =  $admission ->where('ward_admissions.date', '<=', $request -> datereporting)

 ->where('ward_discharges.date_dc', '>', $request -> datereporting)

 ->orWhere(function($admission )use ($request) 
 
 { 
     $admission
     ->where('patients.gender', '=','LELAKI')
     ->where('ward_admissions.date', '<=', $request -> datereporting)
     ->where('ward_discharges.reg_number')
     ->where('ward_admissions.ward', '=', $request -> ward);
 })
//  ->select('patients.name','patients.kp_passport','patients.gender','patients.age','ward_admissions.date','ward_admissions.adm_stage' ,
//  'ward_discharges.date_dc')
//  ->get();
->get(array(
 DB::raw('COUNT(*) as "count"')
));
   return response()->json($statistic);
}

public function Perempuan(Request $request)
{
$admission= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')
->where('patients.gender', '=','PEREMPUAN')
->where('ward_admissions.ward', '=', $request -> ward);


 $statistic =  $admission ->where('ward_admissions.date', '<=', $request -> datereporting)

 ->where('ward_discharges.date_dc', '>', $request -> datereporting)

 ->orWhere(function($admission )use ($request) 
 
 { 
     $admission
     ->where('patients.gender', '=','PEREMPUAN')
     ->where('ward_admissions.date', '<=', $request -> datereporting)
     ->where('ward_discharges.reg_number')
     ->where('ward_admissions.ward', '=', $request -> ward);
 })
//  ->select('patients.name','patients.kp_passport','patients.gender','patients.age','ward_admissions.date','ward_admissions.adm_stage' ,
//  'ward_discharges.date_dc')
//  ->get();
->get(array(
 DB::raw('COUNT(*) as "count"')
));
   return response()->json($statistic);
}

public function JumlahHarian(Request $request)
{
$admission= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')

->where('ward_admissions.ward', '=', $request -> ward);


 $statistic =  $admission ->where('ward_admissions.date', '<=', $request -> datereporting)

 ->where('ward_discharges.date_dc', '>', $request -> datereporting)

 ->orWhere(function($admission )use ($request) 
 
 { 
     $admission
    
     ->where('ward_admissions.date', '<=', $request -> datereporting)
     ->where('ward_discharges.reg_number')
     ->where('ward_admissions.ward', '=', $request -> ward);
 })
//  ->select('patients.name','patients.kp_passport','patients.gender','patients.age','ward_admissions.date','ward_admissions.adm_stage' ,
//  'ward_discharges.date_dc')
//  ->get();
->get(array(
 DB::raw('COUNT(*) as "count"')
));
   return response()->json($statistic);
}

public function Jumlah(Request $request)
{
$admission= DB::table('ward_admissions')
->where('ward_admissions.ward', '=', $request -> ward);

 $statistic =  $admission ->where('ward_admissions.date', '<=', $request -> datereporting)

//  ->select('patients.name','patients.kp_passport','patients.gender','patients.age','ward_admissions.date','ward_admissions.adm_stage' ,
//  'ward_discharges.date_dc')
//  ->get();
->get(array(
 DB::raw('COUNT(*) as "count"')
));
   return response()->json($statistic);
}

public function ward_discharges(Request $request)
{
$admission= DB::table('ward_admissions')
->join('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')

->where('ward_admissions.ward', '=', $request -> ward);

 $statistic =  $admission ->where('ward_admissions.date', '<=', $request -> datereporting)


//  ->select('patients.name','patients.kp_passport','patients.gender','patients.age','ward_admissions.date','ward_admissions.adm_stage' ,
//  'ward_discharges.date_dc')
//  ->get();
->get(array(
 DB::raw('COUNT(*) as "count"')
));
   return response()->json($statistic);
}


public function StepUp(Request $request)
{
$admission= DB::table('ward_admissions')
->join('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')

->where('ward_admissions.ward', '=', $request -> ward)
->where('ward_discharges.type_dc', '=', 'Ditukar ke Hospital Lain');
 $statistic =  $admission ->where('ward_admissions.date', '<=', $request -> datereporting)


//  ->select('patients.name','patients.kp_passport','patients.gender','patients.age','ward_admissions.date','ward_admissions.adm_stage' ,
//  'ward_discharges.date_dc')
//  ->get();
->get(array(
 DB::raw('COUNT(*) as "count"')
));
   return response()->json($statistic);
}
}
