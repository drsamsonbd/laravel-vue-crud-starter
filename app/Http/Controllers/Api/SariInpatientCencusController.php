<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SariInpatientCencusController extends Controller
{
    public function index(Request $request)
    {// sari
    $sari_male= DB::table('ward_admissions')
    ->join('patients','ward_admissions.kp_passport','patients.kp_passport')
    ->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')
    ->where('patients.age', '>','12')
    ->where('patients.gender', '=','LELAKI');

 
    $statistic_sari_male =  $sari_male ->where('ward_admissions.date', '<=', $request -> datereporting)
    ->where('ward_admissions.adm_diagnosis', '=', 'SARI')
    ->where('ward_discharges.date_dc', '>', $request -> datereporting)

    ->orWhere(function($sari_male )use ($request) 
    
    { 
          $sari_male
          ->where('patients.gender', '=','LELAKI')
          ->where('ward_admissions.date', '<=', $request -> datereporting)
          ->where('patients.age', '>','12')    
       ->where('ward_admissions.adm_diagnosis', '=', 'SARI')
          ->where('ward_discharges.reg_number');
    })

 ->get(array(
    DB::raw('COUNT(*) as "count"')
 ));

 $sari_male_paeds= DB::table('ward_admissions')
 ->join('patients','ward_admissions.kp_passport','patients.kp_passport')
 ->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')
 ->where('patients.age', '<','12')
 ->where('patients.gender', '=','LELAKI');

 $statistic_sari_male_paeds =  $sari_male_paeds ->where('ward_admissions.date', '<=', $request -> datereporting)
 ->where('ward_admissions.adm_diagnosis', '=', 'SARI')
 ->where('ward_discharges.date_dc', '>', $request -> datereporting)

 ->orWhere(function($sari_male_paeds )use ($request) 
 
 { 
       $sari_male_paeds
       ->where('patients.gender', '=','LELAKI')
       ->where('ward_admissions.date', '<=', $request -> datereporting)
       ->where('patients.age', '<','12')    
    ->where('ward_admissions.adm_diagnosis', '=', 'SARI')
       ->where('ward_discharges.reg_number');
 })

->get(array(
 DB::raw('COUNT(*) as "count"')
));

$sari_female= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')
->where('patients.age', '>','12')
->where('patients.gender', '=','PEREMPUAN');

$statistic_sari_female =  $sari_female ->where('ward_admissions.date', '<=', $request -> datereporting)
->where('ward_admissions.adm_diagnosis', '=', 'SARI')
->where('ward_discharges.date_dc', '>', $request -> datereporting)

->orWhere(function($sari_female )use ($request) 

{ 
    $sari_female
    ->where('patients.gender', '=','PEREMPUAN')
    ->where('ward_admissions.date', '<=', $request -> datereporting)
    ->where('patients.age', '>','12')    
 ->where('ward_admissions.adm_diagnosis', '=', 'SARI')
    ->where('ward_discharges.reg_number');
})

->get(array(
DB::raw('COUNT(*) as "count"')
));

$sari_female_paeds= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')
->where('patients.age', '<','12')
->where('patients.gender', '=','PEREMPUAN');

$statistic_sari_female_paeds =  $sari_female_paeds ->where('ward_admissions.date', '<=', $request -> datereporting)
->where('ward_admissions.adm_diagnosis', '=', 'SARI')
->where('ward_discharges.date_dc', '>', $request -> datereporting)

->orWhere(function($sari_female_paeds )use ($request) 

{ 
 $sari_female_paeds
 ->where('ward_admissions.date', '<=', $request -> datereporting)
 ->where('patients.age', '<','12')
 ->where('patients.gender', '=','PEREMPUAN')
->where('ward_admissions.adm_diagnosis', '=', 'SARI')
 ->where('ward_discharges.reg_number');
})

->get(array(
DB::raw('COUNT(*) as "count"')
));

$statistic_sari_new_admission = DB::table('ward_admissions')
->where('ward_admissions.date', '=', $request -> datereporting)
->where('ward_admissions.adm_diagnosis', '=', 'SARI')
->get(array(
DB::raw('COUNT(*) as "count"')
));

$statistic_sari_new_discharges= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')
->where('ward_admissions.adm_diagnosis', '=', 'SARI')
->where('ward_discharges.date_dc', '=', $request -> datereporting)
->get(array(
DB::raw('COUNT(*) as "count"')
));

$sari_step_up= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number');


$statistic_sari_step_up =  $sari_step_up ->where('ward_admissions.date', '<=', $request -> datereporting)
->where('ward_admissions.adm_diagnosis', '=', 'SARI')
->where('ward_discharges.date_dc', '=', $request -> datereporting)
->where('ward_discharges.type_dc', '=','Ditukar ke Hospital Lain')

->get(array(
DB::raw('COUNT(*) as "count"')
));

$sari_death= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number');

$statistic_sari_death =  $sari_death ->where('ward_admissions.date', '<=', $request -> datereporting)
->where('ward_admissions.adm_diagnosis', '=', 'SARI')
->where('ward_discharges.date_dc', '=', $request -> datereporting)
->where('ward_discharges.type_dc', '=','Mati')

->get(array(
DB::raw('COUNT(*) as "count"')
));

return response()->json( compact('statistic_sari_male', 'statistic_sari_male_paeds','statistic_sari_female',
'statistic_sari_female_paeds' ,'statistic_sari_new_admission', 'statistic_sari_new_discharges','statistic_sari_step_up', 'statistic_sari_death', 

));
}

}


