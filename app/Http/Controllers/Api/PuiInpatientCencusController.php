<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PuiInpatientCencusController extends Controller
{
    public function index(Request $request)
    {// PUI
    $pui_male= DB::table('ward_admissions')
    ->join('patients','ward_admissions.kp_passport','patients.kp_passport')
    ->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')
    ->where('patients.age', '>','12')
    ->where('patients.gender', '=','LELAKI');

 
    $statistic_pui_male =  $pui_male ->where('ward_admissions.date', '<=', $request -> datereporting)
    ->where('ward_admissions.adm_diagnosis', '=', 'PUI')
    ->where('ward_discharges.date_dc', '>', $request -> datereporting)

    ->orWhere(function($pui_male )use ($request) 
    
    { 
          $pui_male
          ->where('patients.gender', '=','LELAKI')
          ->where('ward_admissions.date', '<=', $request -> datereporting)
          ->where('patients.age', '>','12')    
       ->where('ward_admissions.adm_diagnosis', '=', 'PUI')
          ->where('ward_discharges.reg_number');
    })

 ->get(array(
    DB::raw('COUNT(*) as "count"')
 ));

 $pui_male_paeds= DB::table('ward_admissions')
 ->join('patients','ward_admissions.kp_passport','patients.kp_passport')
 ->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')
 ->where('patients.age', '<','12')
 ->where('patients.gender', '=','LELAKI');

 $statistic_pui_male_paeds =  $pui_male_paeds ->where('ward_admissions.date', '<=', $request -> datereporting)
 ->where('ward_admissions.adm_diagnosis', '=', 'PUI')
 ->where('ward_discharges.date_dc', '>', $request -> datereporting)

 ->orWhere(function($pui_male_paeds )use ($request) 
 
 { 
       $pui_male_paeds
       ->where('patients.gender', '=','LELAKI')
       ->where('ward_admissions.date', '<=', $request -> datereporting)
       ->where('patients.age', '<','12')    
    ->where('ward_admissions.adm_diagnosis', '=', 'PUI')
       ->where('ward_discharges.reg_number');
 })

->get(array(
 DB::raw('COUNT(*) as "count"')
));

$pui_female= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')
->where('patients.age', '>','12')
->where('patients.gender', '=','PEREMPUAN');

$statistic_pui_female =  $pui_female ->where('ward_admissions.date', '<=', $request -> datereporting)
->where('ward_admissions.adm_diagnosis', '=', 'PUI')
->where('ward_discharges.date_dc', '>', $request -> datereporting)

->orWhere(function($pui_female )use ($request) 

{ 
    $pui_female
    ->where('patients.gender', '=','PEREMPUAN')
    ->where('ward_admissions.date', '<=', $request -> datereporting)
    ->where('patients.age', '>','12')    
 ->where('ward_admissions.adm_diagnosis', '=', 'PUI')
    ->where('ward_discharges.reg_number');
})

->get(array(
DB::raw('COUNT(*) as "count"')
));

$pui_female_paeds= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')
->where('patients.age', '<','12')
->where('patients.gender', '=','PEREMPUAN');

$statistic_pui_female_paeds =  $pui_female_paeds ->where('ward_admissions.date', '<=', $request -> datereporting)
->where('ward_admissions.adm_diagnosis', '=', 'PUI')
->where('ward_discharges.date_dc', '>', $request -> datereporting)

->orWhere(function($pui_female_paeds )use ($request) 

{ 
 $pui_female_paeds
 ->where('ward_admissions.date', '<=', $request -> datereporting)
 ->where('patients.age', '<','12')
 ->where('patients.gender', '=','PEREMPUAN')
->where('ward_admissions.adm_diagnosis', '=', 'PUI')
 ->where('ward_discharges.reg_number');
})

->get(array(
DB::raw('COUNT(*) as "count"')
));

$statistic_pui_new_admission = DB::table('ward_admissions')
->where('ward_admissions.date', '=', $request -> datereporting)
->where('ward_admissions.adm_diagnosis', '=', 'PUI')
->get(array(
DB::raw('COUNT(*) as "count"')
));

$statistic_pui_new_discharges= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')
->where('ward_admissions.adm_diagnosis', '=', 'PUI')
->where('ward_discharges.date_dc', '=', $request -> datereporting)
->get(array(
DB::raw('COUNT(*) as "count"')
));

$pui_step_up= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number');


$statistic_pui_step_up =  $pui_step_up ->where('ward_admissions.date', '<=', $request -> datereporting)
->where('ward_admissions.adm_diagnosis', '=', 'PUI')
->where('ward_discharges.date_dc', '=', $request -> datereporting)
->where('ward_discharges.type_dc', '=','Ditukar ke Hospital Lain')

->get(array(
DB::raw('COUNT(*) as "count"')
));

$pui_death= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number');

$statistic_pui_death =  $pui_death ->where('ward_admissions.date', '<=', $request -> datereporting)
->where('ward_admissions.adm_diagnosis', '=', 'PUI')
->where('ward_discharges.date_dc', '=', $request -> datereporting)
->where('ward_discharges.type_dc', '=','Mati')

->get(array(
DB::raw('COUNT(*) as "count"')
));

// stat by ward

//$pui_male_ward= DB::table('ward_admissions')
//->join('patients','ward_admissions.kp_passport','patients.kp_passport')
//->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number');
//
//
//$statistic_pui_male_ward =  $pui_male_ward ->where('ward_admissions.date', '<=', $request -> datereporting)
//->where('ward_admissions.adm_diagnosis', '=', 'PUI')
//->where('ward_admissions.ward', '=', 'Male Ward')
//->where('ward_discharges.date_dc', '>', $request -> datereporting)
//
//->orWhere(function($pui_male_ward )use ($request) 
//
//{ 
// $pui_male_ward
//
// ->where('ward_admissions.date', '<=', $request -> datereporting)
// ->where('ward_admissions.adm_diagnosis', '=', 'PUI')
// ->where('ward_admissions.ward', '=', 'Male Ward')
// ->where('ward_discharges.reg_number');
//})
//
//->get(array(
//DB::raw('COUNT(*) as "count"')
//));
//
//$pui_female_ward= DB::table('ward_admissions')
//->join('patients','ward_admissions.kp_passport','patients.kp_passport')
//->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number');
//
//$statistic_pui_female_ward =  $pui_female_ward ->where('ward_admissions.date', '<=', $request -> datereporting)
//->where('ward_admissions.adm_diagnosis', '=', 'PUI')
//->where('ward_admissions.ward', '=', 'Female Ward')
//->where('ward_discharges.date_dc', '>', $request -> datereporting)
//
//->orWhere(function($pui_female_ward )use ($request) 
//
//{ 
// $pui_female_ward
//
// ->where('ward_admissions.date', '<=', $request -> datereporting)
// ->where('ward_admissions.adm_diagnosis', '=', 'PUI')
// ->where('ward_admissions.ward', '=', 'Female Ward')
// ->where('ward_discharges.reg_number');
//})
//
//->get(array(
//DB::raw('COUNT(*) as "count"')
//));
//
//$pui_maternity_ward= DB::table('ward_admissions')
//->join('patients','ward_admissions.kp_passport','patients.kp_passport')
//->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number');
//
//$statistic_pui_maternity_ward =  $pui_maternity_ward ->where('ward_admissions.date', '<=', $request -> datereporting)
//->where('ward_admissions.adm_diagnosis', '=', 'PUI')
//->where('ward_admissions.ward', '=', 'Maternity Ward')
//->where('ward_discharges.date_dc', '>', $request -> datereporting)
//
//->orWhere(function($pui_maternity_ward )use ($request) 
//
//{ 
// $pui_maternity_ward
//
// ->where('ward_admissions.date', '<=', $request -> datereporting)
// ->where('ward_admissions.adm_diagnosis', '=', 'PUI')
// ->where('ward_admissions.ward', '=', 'Maternity Ward')
// ->where('ward_discharges.reg_number');
//})
//
//->get(array(
//DB::raw('COUNT(*) as "count"')
//));
//
//$pui_children_ward= DB::table('ward_admissions')
//->join('patients','ward_admissions.kp_passport','patients.kp_passport')
//->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number');
//
//$statistic_pui_children_ward =  $pui_children_ward ->where('ward_admissions.date', '<=', $request -> datereporting)
//->where('ward_admissions.adm_diagnosis', '=', 'PUI')
//->where('ward_admissions.ward', '=', 'Children Ward')
//->where('ward_discharges.date_dc', '>', $request -> datereporting)
//
//->orWhere(function($pui_children_ward )use ($request) 
//
//{ 
// $pui_children_ward
//
// ->where('ward_admissions.date', '<=', $request -> datereporting)
// ->where('ward_admissions.adm_diagnosis', '=', 'PUI')
// ->where('ward_admissions.ward', '=', 'Children Ward')
// ->where('ward_discharges.reg_number');
//})
//
//->get(array(
//DB::raw('COUNT(*) as "count"')
//));
//
//$pui_acute_ward= DB::table('ward_admissions')
//->join('patients','ward_admissions.kp_passport','patients.kp_passport')
//->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number');
//
//$statistic_pui_acute_ward =  $pui_acute_ward ->where('ward_admissions.date', '<=', $request -> datereporting)
//->where('ward_admissions.adm_diagnosis', '=', 'PUI')
//->where('ward_admissions.ward', '=', 'Acute Ward')
//->where('ward_discharges.date_dc', '>', $request -> datereporting)
//
//->orWhere(function($pui_acute_ward )use ($request) 
//
//{ 
// $pui_acute_ward
//
// ->where('ward_admissions.date', '<=', $request -> datereporting)
// ->where('ward_admissions.adm_diagnosis', '=', 'PUI')
// ->where('ward_admissions.ward', '=', 'Acute Ward')
// ->where('ward_discharges.reg_number');
//})
//
//->get(array(
//DB::raw('COUNT(*) as "count"')
//));
//
//$pui_male_tb_ward= DB::table('ward_admissions')
//->join('patients','ward_admissions.kp_passport','patients.kp_passport')
//->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number');
//
//$statistic_pui_male_tb_ward =  $pui_male_tb_ward ->where('ward_admissions.date', '<=', $request -> datereporting)
//->where('ward_admissions.adm_diagnosis', '=', 'PUI')
//->where('ward_admissions.ward', '=', 'Male TB Ward')
//->where('ward_discharges.date_dc', '>', $request -> datereporting)
//
//->orWhere(function($pui_male_tb_ward )use ($request) 
//
//{ 
// $pui_male_tb_ward
//
// ->where('ward_admissions.date', '<=', $request -> datereporting)
// ->where('ward_admissions.adm_diagnosis', '=', 'PUI')
// ->where('ward_admissions.ward', '=', 'Male TB Ward')
// ->where('ward_discharges.reg_number');
//})
//
//->get(array(
//DB::raw('COUNT(*) as "count"')
//));
//
//
//$pui_female_tb_ward= DB::table('ward_admissions')
//->join('patients','ward_admissions.kp_passport','patients.kp_passport')
//->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number');
//
//$statistic_pui_female_tb_ward =  $pui_female_tb_ward ->where('ward_admissions.date', '<=', $request -> datereporting)
//->where('ward_admissions.adm_diagnosis', '=', 'PUI')
//->where('ward_admissions.ward', '=', 'Female TB Ward')
//->where('ward_discharges.date_dc', '>', $request -> datereporting)
//
//->orWhere(function($pui_female_tb_ward )use ($request) 
//
//{ 
// $pui_female_tb_ward
//
// ->where('ward_admissions.date', '<=', $request -> datereporting)
// ->where('ward_admissions.adm_diagnosis', '=', 'PUI')
// ->where('ward_admissions.ward', '=', 'Female TB Ward')
// ->where('ward_discharges.reg_number');
//})
//
//->get(array(
//DB::raw('COUNT(*) as "count"')
//));

return response()->json( compact('statistic_pui_male', 'statistic_pui_male_paeds','statistic_pui_female',
'statistic_pui_female_paeds' ,'statistic_pui_new_admission', 'statistic_pui_new_discharges','statistic_pui_step_up', 'statistic_pui_death', 
//'statistic_pui_male_ward',
//'statistic_pui_female_ward',  
//'statistic_pui_maternity_ward', 
//'statistic_pui_children_ward', 
//'statistic_pui_acute_ward',
//'statistic_pui_male_tb_ward',
//'statistic_pui_female_tb_ward'
));
}

}


