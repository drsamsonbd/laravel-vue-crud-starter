<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InpatientCencusController extends Controller
{
    public function index(Request $request)
    {
//Non covid
         $nca_male= DB::table('ward_admissions')
         ->join('patients','ward_admissions.kp_passport','patients.kp_passport')
         ->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')
         ->where('patients.age', '>','12')
         ->where('patients.gender', '=','LELAKI');

      
         $statistic_nca_male =  $nca_male ->where('ward_admissions.date', '<=', $request -> datereporting)
         ->where('ward_admissions.adm_diagnosis', '=', 'Non COVID')
         ->where('ward_discharges.date_dc', '>', $request -> datereporting)

         ->orWhere(function($nca_male )use ($request) 
         
         { 
               $nca_male
               ->where('patients.gender', '=','LELAKI')
               ->where('ward_admissions.date', '<=', $request -> datereporting)
               ->where('patients.age', '>','12')    
            ->where('ward_admissions.adm_diagnosis', '=', 'Non COVID')
               ->where('ward_discharges.reg_number');
         })

      ->get(array(
         DB::raw('COUNT(*) as "count"')
      ));

      $nca_male_paeds= DB::table('ward_admissions')
      ->join('patients','ward_admissions.kp_passport','patients.kp_passport')
      ->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')
      ->where('patients.age', '<','12')
      ->where('patients.gender', '=','LELAKI');

   
      $statistic_nca_male_paeds =  $nca_male_paeds ->where('ward_admissions.date', '<=', $request -> datereporting)
      ->where('ward_admissions.adm_diagnosis', '=', 'Non COVID')
      ->where('ward_discharges.date_dc', '>', $request -> datereporting)

      ->orWhere(function($nca_male_paeds )use ($request) 
      
      { 
            $nca_male_paeds
            ->where('patients.gender', '=','LELAKI')
            ->where('ward_admissions.date', '<=', $request -> datereporting)
            ->where('patients.age', '<','12')    
         ->where('ward_admissions.adm_diagnosis', '=', 'Non COVID')
            ->where('ward_discharges.reg_number');
      })

   ->get(array(
      DB::raw('COUNT(*) as "count"')
   ));

   $nca_female= DB::table('ward_admissions')
   ->join('patients','ward_admissions.kp_passport','patients.kp_passport')
   ->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')
   ->where('patients.age', '>','12')
   ->where('patients.gender', '=','PEREMPUAN');


   $statistic_nca_female =  $nca_female ->where('ward_admissions.date', '<=', $request -> datereporting)
   ->where('ward_admissions.adm_diagnosis', '=', 'Non COVID')
   ->where('ward_discharges.date_dc', '>', $request -> datereporting)

   ->orWhere(function($nca_female )use ($request) 
   
   { 
         $nca_female
         ->where('patients.gender', '=','PEREMPUAN')
         ->where('ward_admissions.date', '<=', $request -> datereporting)
         ->where('patients.age', '>','12')    
      ->where('ward_admissions.adm_diagnosis', '=', 'Non COVID')
         ->where('ward_discharges.reg_number');
   })

->get(array(
   DB::raw('COUNT(*) as "count"')
));

$nca_female_paeds= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')
->where('patients.age', '<','12')
->where('patients.gender', '=','PEREMPUAN');


$statistic_nca_female_paeds =  $nca_female_paeds ->where('ward_admissions.date', '<=', $request -> datereporting)
->where('ward_admissions.adm_diagnosis', '=', 'Non COVID')
->where('ward_discharges.date_dc', '>', $request -> datereporting)

->orWhere(function($nca_female_paeds )use ($request) 

{ 
      $nca_female_paeds
      ->where('ward_admissions.date', '<=', $request -> datereporting)
      ->where('patients.age', '<','12')
      ->where('patients.gender', '=','PEREMPUAN')
   ->where('ward_admissions.adm_diagnosis', '=', 'Non COVID')
      ->where('ward_discharges.reg_number');
})

->get(array(
DB::raw('COUNT(*) as "count"')
));

$statistic_nca_new_admission = DB::table('ward_admissions')
->where('ward_admissions.date', '=', $request -> datereporting)
->where('ward_admissions.adm_diagnosis', '=', 'Non COVID')
->get(array(
DB::raw('COUNT(*) as "count"')
));

$statistic_nca_new_discharges= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')
->where('ward_admissions.adm_diagnosis', '=', 'Non COVID')
->where('ward_discharges.date_dc', '=', $request -> datereporting)
->get(array(
DB::raw('COUNT(*) as "count"')
));

$nca_step_up= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number');



$statistic_nca_step_up =  $nca_step_up ->where('ward_admissions.date', '<=', $request -> datereporting)
->where('ward_admissions.adm_diagnosis', '=', 'Non COVID')
->where('ward_discharges.date_dc', '=', $request -> datereporting)
->where('ward_discharges.type_dc', '=','Ditukar ke Hospital Lain')


->get(array(
DB::raw('COUNT(*) as "count"')
));

$nca_death= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number');


$statistic_nca_death =  $nca_death ->where('ward_admissions.date', '<=', $request -> datereporting)
->where('ward_admissions.adm_diagnosis', '=', 'Non COVID')
->where('ward_discharges.date_dc', '=', $request -> datereporting)
->where('ward_discharges.type_dc', '=','Mati')

->get(array(
DB::raw('COUNT(*) as "count"')
));


// stat by ward

$nca_male_ward= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number');


$statistic_nca_male_ward =  $nca_male_ward ->where('ward_admissions.date', '<=', $request -> datereporting)
->where('ward_admissions.adm_diagnosis', '=', 'Non COVID')
->where('ward_admissions.ward', '=', 'Male Ward')
->where('ward_discharges.date_dc', '>', $request -> datereporting)

->orWhere(function($nca_male_ward )use ($request) 

{ 
      $nca_male_ward
   
      ->where('ward_admissions.date', '<=', $request -> datereporting)
      ->where('ward_admissions.adm_diagnosis', '=', 'Non COVID')
      ->where('ward_admissions.ward', '=', 'Male Ward')
      ->where('ward_discharges.reg_number');
})

->get(array(
DB::raw('COUNT(*) as "count"')
));

$nca_female_ward= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number');

$statistic_nca_female_ward =  $nca_female_ward ->where('ward_admissions.date', '<=', $request -> datereporting)
->where('ward_admissions.adm_diagnosis', '=', 'Non COVID')
->where('ward_admissions.ward', '=', 'Female Ward')
->where('ward_discharges.date_dc', '>', $request -> datereporting)

->orWhere(function($nca_female_ward )use ($request) 

{ 
      $nca_female_ward
   
      ->where('ward_admissions.date', '<=', $request -> datereporting)
      ->where('ward_admissions.adm_diagnosis', '=', 'Non COVID')
      ->where('ward_admissions.ward', '=', 'Female Ward')
      ->where('ward_discharges.reg_number');
})

->get(array(
DB::raw('COUNT(*) as "count"')
));

$nca_maternity_ward= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number');

$statistic_nca_maternity_ward =  $nca_maternity_ward ->where('ward_admissions.date', '<=', $request -> datereporting)
->where('ward_admissions.adm_diagnosis', '=', 'Non COVID')
->where('ward_admissions.ward', '=', 'Maternity Ward')
->where('ward_discharges.date_dc', '>', $request -> datereporting)

->orWhere(function($nca_maternity_ward )use ($request) 

{ 
      $nca_maternity_ward
   
      ->where('ward_admissions.date', '<=', $request -> datereporting)
      ->where('ward_admissions.adm_diagnosis', '=', 'Non COVID')
      ->where('ward_admissions.ward', '=', 'Maternity Ward')
      ->where('ward_discharges.reg_number');
})

->get(array(
DB::raw('COUNT(*) as "count"')
));

$nca_children_ward= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number');

$statistic_nca_children_ward =  $nca_children_ward ->where('ward_admissions.date', '<=', $request -> datereporting)
->where('ward_admissions.adm_diagnosis', '=', 'Non COVID')
->where('ward_admissions.ward', '=', 'Children Ward')
->where('ward_discharges.date_dc', '>', $request -> datereporting)

->orWhere(function($nca_children_ward )use ($request) 

{ 
      $nca_children_ward
   
      ->where('ward_admissions.date', '<=', $request -> datereporting)
      ->where('ward_admissions.adm_diagnosis', '=', 'Non COVID')
      ->where('ward_admissions.ward', '=', 'Children Ward')
      ->where('ward_discharges.reg_number');
})

->get(array(
DB::raw('COUNT(*) as "count"')
));

$nca_acute_ward= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number');

$statistic_nca_acute_ward =  $nca_acute_ward ->where('ward_admissions.date', '<=', $request -> datereporting)
->where('ward_admissions.adm_diagnosis', '=', 'Non COVID')
->where('ward_admissions.ward', '=', 'Acute Ward')
->where('ward_discharges.date_dc', '>', $request -> datereporting)

->orWhere(function($nca_acute_ward )use ($request) 

{ 
      $nca_acute_ward
   
      ->where('ward_admissions.date', '<=', $request -> datereporting)
      ->where('ward_admissions.adm_diagnosis', '=', 'Non COVID')
      ->where('ward_admissions.ward', '=', 'Acute Ward')
      ->where('ward_discharges.reg_number');
})

->get(array(
DB::raw('COUNT(*) as "count"')
));

$nca_male_tb_ward= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number');

$statistic_nca_male_tb_ward =  $nca_male_tb_ward ->where('ward_admissions.date', '<=', $request -> datereporting)
->where('ward_admissions.adm_diagnosis', '=', 'Non COVID')
->where('ward_admissions.ward', '=', 'Male TB Ward')
->where('ward_discharges.date_dc', '>', $request -> datereporting)

->orWhere(function($nca_male_tb_ward )use ($request) 

{ 
      $nca_male_tb_ward
   
      ->where('ward_admissions.date', '<=', $request -> datereporting)
      ->where('ward_admissions.adm_diagnosis', '=', 'Non COVID')
      ->where('ward_admissions.ward', '=', 'Male TB Ward')
      ->where('ward_discharges.reg_number');
})

->get(array(
DB::raw('COUNT(*) as "count"')
));


$nca_female_tb_ward= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number');

$statistic_nca_female_tb_ward =  $nca_female_tb_ward ->where('ward_admissions.date', '<=', $request -> datereporting)
->where('ward_admissions.adm_diagnosis', '=', 'Non COVID')
->where('ward_admissions.ward', '=', 'Female TB Ward')
->where('ward_discharges.date_dc', '>', $request -> datereporting)

->orWhere(function($nca_female_tb_ward )use ($request) 

{ 
      $nca_female_tb_ward
   
      ->where('ward_admissions.date', '<=', $request -> datereporting)
      ->where('ward_admissions.adm_diagnosis', '=', 'Non COVID')
      ->where('ward_admissions.ward', '=', 'Female TB Ward')
      ->where('ward_discharges.reg_number');
})

->get(array(
DB::raw('COUNT(*) as "count"')
));

       
$admission= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number');

 $statistic =  $admission ->where('ward_admissions.date', '<=', $request -> datereporting)

 ->where('ward_discharges.date_dc', '>', $request -> datereporting)

 ->orWhere(function($admission )use ($request) 
 
 { 
     $admission  
     ->where('ward_admissions.date', '<=', $request -> datereporting)
  
     ->where('ward_discharges.reg_number');
 });
 $total= $statistic->count();
   
 $bor= ($total/52*100);
 $total_bor= round($bor,2);

   return response()->json( compact('statistic_nca_male', 'statistic_nca_male_paeds','statistic_nca_female',
   'statistic_nca_female_paeds' ,'statistic_nca_new_admission', 'statistic_nca_new_discharges','statistic_nca_step_up', 'statistic_nca_death', 'statistic_nca_male_ward',
   'statistic_nca_female_ward',  'statistic_nca_maternity_ward', 
   'statistic_nca_children_ward', 'statistic_nca_acute_ward','statistic_nca_male_tb_ward','statistic_nca_female_tb_ward', 'total',
   'total_bor'));
}



}
