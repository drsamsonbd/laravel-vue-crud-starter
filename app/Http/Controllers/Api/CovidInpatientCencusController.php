<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CovidInpatientCencusController extends Controller
{
    public function index(Request $request)
    {
//COVID-19
         $covid_male= DB::table('ward_admissions')
         ->join('patients','ward_admissions.kp_passport','patients.kp_passport')
         ->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')
         ->where('patients.age', '>','12')
         ->where('patients.gender', '=','LELAKI');

      
         $statistic_covid_male =  $covid_male ->where('ward_admissions.date', '<=', $request -> datereporting)
         ->where('ward_admissions.adm_diagnosis', '=', 'COVID-19')
         ->where('ward_discharges.date_dc', '>', $request -> datereporting)

         ->orWhere(function($covid_male )use ($request) 
         
         { 
               $covid_male
               ->where('patients.gender', '=','LELAKI')
               ->where('ward_admissions.date', '<=', $request -> datereporting)
               ->where('patients.age', '>','12')    
            ->where('ward_admissions.adm_diagnosis', '=', 'COVID-19')
               ->where('ward_discharges.reg_number');
         })

      ->get(array(
         DB::raw('COUNT(*) as "count"')
      ));

      $covid_male_paeds= DB::table('ward_admissions')
      ->join('patients','ward_admissions.kp_passport','patients.kp_passport')
      ->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')
      ->where('patients.age', '<','12')
      ->where('patients.gender', '=','LELAKI');

   
      $statistic_covid_male_paeds =  $covid_male_paeds ->where('ward_admissions.date', '<=', $request -> datereporting)
      ->where('ward_admissions.adm_diagnosis', '=', 'COVID-19')
      ->where('ward_discharges.date_dc', '>', $request -> datereporting)

      ->orWhere(function($covid_male_paeds )use ($request) 
      
      { 
            $covid_male_paeds
            ->where('patients.gender', '=','LELAKI')
            ->where('ward_admissions.date', '<=', $request -> datereporting)
            ->where('patients.age', '<','12')    
         ->where('ward_admissions.adm_diagnosis', '=', 'COVID-19')
            ->where('ward_discharges.reg_number');
      })

   ->get(array(
      DB::raw('COUNT(*) as "count"')
   ));

   $covid_female= DB::table('ward_admissions')
   ->join('patients','ward_admissions.kp_passport','patients.kp_passport')
   ->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')
   ->where('patients.age', '>','12')
   ->where('patients.gender', '=','PEREMPUAN');

   $statistic_covid_female =  $covid_female ->where('ward_admissions.date', '<=', $request -> datereporting)
   ->where('ward_admissions.adm_diagnosis', '=', 'COVID-19')
   ->where('ward_discharges.date_dc', '>', $request -> datereporting)

   ->orWhere(function($covid_female )use ($request) 
   
   { 
         $covid_female
         ->where('patients.gender', '=','PEREMPUAN')
         ->where('ward_admissions.date', '<=', $request -> datereporting)
         ->where('patients.age', '>','12')    
      ->where('ward_admissions.adm_diagnosis', '=', 'COVID-19')
         ->where('ward_discharges.reg_number');
   })

->get(array(
   DB::raw('COUNT(*) as "count"')
));

$covid_female_paeds= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')
->where('patients.age', '<','12')
->where('patients.gender', '=','PEREMPUAN');

$statistic_covid_female_paeds =  $covid_female_paeds ->where('ward_admissions.date', '<=', $request -> datereporting)
->where('ward_admissions.adm_diagnosis', '=', 'COVID-19')
->where('ward_discharges.date_dc', '>', $request -> datereporting)

->orWhere(function($covid_female_paeds )use ($request) 

{ 
      $covid_female_paeds
      ->where('ward_admissions.date', '<=', $request -> datereporting)
      ->where('patients.age', '<','12')
      ->where('patients.gender', '=','PEREMPUAN')
   ->where('ward_admissions.adm_diagnosis', '=', 'COVID-19')
      ->where('ward_discharges.reg_number');
})

->get(array(
DB::raw('COUNT(*) as "count"')
));


$covid_local= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')
->where('patients.nationality', '=','Malaysia');

$statistic_covid_local =  $covid_local ->where('ward_admissions.date', '<=', $request -> datereporting)
->where('ward_admissions.adm_diagnosis', '=', 'COVID-19')
->where('ward_discharges.date_dc', '>', $request -> datereporting)

->orWhere(function($covid_local )use ($request) 

{ 
      $covid_local
      ->where('ward_admissions.date', '<=', $request -> datereporting)
      ->where('patients.nationality', '=','Malaysia')
    ->where('ward_admissions.adm_diagnosis', '=', 'COVID-19')
      ->where('ward_discharges.reg_number');
})

->get(array(
DB::raw('COUNT(*) as "count"')
));

$covid_non_local= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')
->where('patients.nationality', '<>','Malaysia');

$statistic_covid_non_local =  $covid_non_local ->where('ward_admissions.date', '<=', $request -> datereporting)
->where('ward_admissions.adm_diagnosis', '=', 'COVID-19')
->where('ward_discharges.date_dc', '>', $request -> datereporting)

->orWhere(function($covid_non_local )use ($request) 

{ 
      $covid_non_local
      ->where('ward_admissions.date', '<=', $request -> datereporting)
      ->where('patients.nationality', '<>','Malaysia')
    ->where('ward_admissions.adm_diagnosis', '=', 'COVID-19')
      ->where('ward_discharges.reg_number');
})

->get(array(
DB::raw('COUNT(*) as "count"')
));

$statistic_covid_new_admission = DB::table('ward_admissions')
->where('ward_admissions.date', '=', $request -> datereporting)
->where('ward_admissions.adm_diagnosis', '=', 'COVID-19')
->get(array(
DB::raw('COUNT(*) as "count"')
));



$statistic_covid_new_admission_1 = DB::table('ward_admissions')
->where('ward_admissions.date', '=', $request -> datereporting)
->where('ward_admissions.adm_diagnosis', '=', 'COVID-19')
->where('ward_admissions.adm_stage', '=', 1)
->get(array(
DB::raw('COUNT(*) as "count"')
));

$statistic_covid_new_admission_2 = DB::table('ward_admissions')
->where('ward_admissions.date', '=', $request -> datereporting)
->where('ward_admissions.adm_diagnosis', '=', 'COVID-19')
->where('ward_admissions.adm_stage', '=', 2)
->get(array(
DB::raw('COUNT(*) as "count"')
));

$statistic_covid_new_admission_3 = DB::table('ward_admissions')
->where('ward_admissions.date', '=', $request -> datereporting)
->where('ward_admissions.adm_diagnosis', '=', 'COVID-19')
->where('ward_admissions.adm_stage', '=', 3)
->get(array(
DB::raw('COUNT(*) as "count"')
));

$statistic_covid_new_admission_4 = DB::table('ward_admissions')
->where('ward_admissions.date', '=', $request -> datereporting)
->where('ward_admissions.adm_diagnosis', '=', 'COVID-19')
->where('ward_admissions.adm_stage', '=', 4)
->get(array(
DB::raw('COUNT(*) as "count"')
));

$statistic_covid_new_admission_5 = DB::table('ward_admissions')
->where('ward_admissions.date', '=', $request -> datereporting)
->where('ward_admissions.adm_diagnosis', '=', 'COVID-19')
->where('ward_admissions.adm_stage', '=', 5)
->get(array(
DB::raw('COUNT(*) as "count"')
));


$statistic_covid_new_discharges= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')
->where('ward_admissions.adm_diagnosis', '=', 'COVID-19')
->where('ward_discharges.date_dc', '=', $request -> datereporting)
->get(array(
DB::raw('COUNT(*) as "count"')
));

$statistic_covid_home_q= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')
->where('ward_admissions.adm_diagnosis', '=', 'COVID-19')
->where('ward_discharges.date_dc', '=', $request -> datereporting)
->where('ward_discharges.type_dc', '=','Home Quarantine')
->get(array(
DB::raw('COUNT(*) as "count"')
));

$covid_step_up= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number');


$statistic_covid_step_up =  $covid_step_up ->where('ward_admissions.date', '<=', $request -> datereporting)
->where('ward_admissions.adm_diagnosis', '=', 'COVID-19')
->where('ward_discharges.date_dc', '=', $request -> datereporting)
->where('ward_discharges.type_dc', '=','Ditukar ke Hospital Lain')

->get(array(
DB::raw('COUNT(*) as "count"')
));

$covid_death= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number');

$statistic_covid_death =  $covid_death ->where('ward_admissions.date', '<=', $request -> datereporting)
->where('ward_admissions.adm_diagnosis', '=', 'COVID-19')
->where('ward_discharges.date_dc', '=', $request -> datereporting)
->where('ward_discharges.type_dc', '=','Mati')

->get(array(
DB::raw('COUNT(*) as "count"')
));

// staging stat


$covid_stage_1= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number');

$statistic_stage_1 =  $covid_stage_1 ->where('ward_admissions.date', '<=', $request -> datereporting)
->where('ward_admissions.adm_stage', '=', 1)
->where('ward_discharges.date_dc', '>', $request -> datereporting)

->orWhere(function($covid_stage_1)use ($request) 
{ 
      $covid_stage_1  
      ->where('ward_admissions.date', '<=', $request -> datereporting)
      ->where('ward_admissions.adm_stage', '=', 1)
      ->where('ward_discharges.reg_number');
})
->get(array(
DB::raw('COUNT(*) as "count"')
));

$covid_stage_2= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number');

$statistic_stage_2 =  $covid_stage_2 ->where('ward_admissions.date', '<=', $request -> datereporting)
->where('ward_admissions.adm_stage', '=', 2)
->where('ward_discharges.date_dc', '>', $request -> datereporting)

->orWhere(function($covid_stage_2)use ($request) 
{ 
      $covid_stage_2  
      ->where('ward_admissions.date', '<=', $request -> datereporting)
      ->where('ward_admissions.adm_stage', '=', 2)
      ->where('ward_discharges.reg_number');
})
->get(array(
DB::raw('COUNT(*) as "count"')
));

$covid_stage_3= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number');

$statistic_stage_3 =  $covid_stage_3 ->where('ward_admissions.date', '<=', $request -> datereporting)
->where('ward_admissions.adm_stage', '=', 3)
->where('ward_discharges.date_dc', '>', $request -> datereporting)

->orWhere(function($covid_stage_3)use ($request) 
{ 
      $covid_stage_3  
      ->where('ward_admissions.date', '<=', $request -> datereporting)
      ->where('ward_admissions.adm_stage', '=', 3)
      ->where('ward_discharges.reg_number');
})
->get(array(
DB::raw('COUNT(*) as "count"')
));

$covid_stage_4= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number');

$statistic_stage_4 =  $covid_stage_4 ->where('ward_admissions.date', '<=', $request -> datereporting)
->where('ward_admissions.adm_stage', '=', 4)
->where('ward_discharges.date_dc', '>', $request -> datereporting)

->orWhere(function($covid_stage_4)use ($request) 
{ 
      $covid_stage_4  
      ->where('ward_admissions.date', '<=', $request -> datereporting)
      ->where('ward_admissions.adm_stage', '=', 4)
      ->where('ward_discharges.reg_number');
})
->get(array(
DB::raw('COUNT(*) as "count"')
));

$covid_stage_4= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number');

$statistic_stage_4 =  $covid_stage_4 ->where('ward_admissions.date', '<=', $request -> datereporting)
->where('ward_admissions.adm_stage', '=', 4)
->where('ward_discharges.date_dc', '>', $request -> datereporting)

->orWhere(function($covid_stage_4)use ($request) 
{ 
      $covid_stage_4  
      ->where('ward_admissions.date', '<=', $request -> datereporting)
      ->where('ward_admissions.adm_stage', '=', 4)
      ->where('ward_discharges.reg_number');
})
->get(array(
DB::raw('COUNT(*) as "count"')
));


$covid_stage_5= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number');

$statistic_stage_5 =  $covid_stage_5 ->where('ward_admissions.date', '<=', $request -> datereporting)
->where('ward_admissions.adm_stage', '=', 5)
->where('ward_discharges.date_dc', '>', $request -> datereporting)

->orWhere(function($covid_stage_5)use ($request) 
{ 
      $covid_stage_5  
      ->where('ward_admissions.date', '<=', $request -> datereporting)
      ->where('ward_admissions.adm_stage', '=', 5)
      ->where('ward_discharges.reg_number');
})
->get(array(
DB::raw('COUNT(*) as "count"')
));


$covid_stage_1_1= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->join('vaccination_statuses','vaccination_statuses.patient_kp_passport','patients.kp_passport')
->leftJoin('case_samplings','ward_admissions.kp_passport','=','case_samplings.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number');

$statistic_stage_1_1 =  $covid_stage_1_1 ->where('ward_admissions.date', '<=', $request -> datereporting)
->where('ward_admissions.adm_stage', '=', 1)
->where('vaccination_statuses.date_first','<>', null)                
->where('vaccination_statuses.date_second','=', null)
->where('ward_discharges.date_dc', '>', $request -> datereporting)

->orWhere(function($covid_stage_1_1)use ($request) 
{ 
      $covid_stage_1_1  
      ->where('ward_admissions.date', '<=', $request -> datereporting)
      ->where('ward_admissions.adm_stage', '=', 1)
      ->where('vaccination_statuses.date_first','<>', null)                
      ->where('vaccination_statuses.date_second','=', null)
      ->where('ward_discharges.reg_number');
})
->get(array(
DB::raw('COUNT(*) as "count"')
));

$covid_stage_2_1= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->join('vaccination_statuses','vaccination_statuses.patient_kp_passport','patients.kp_passport')
->leftJoin('case_samplings','ward_admissions.kp_passport','=','case_samplings.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number');

$statistic_stage_2_1 =  $covid_stage_2_1 ->where('ward_admissions.date', '<=', $request -> datereporting)
->where('ward_admissions.adm_stage', '=', 2)
->where('vaccination_statuses.date_first','<>', null)                
->where('vaccination_statuses.date_second','=', null)
->where('ward_discharges.date_dc', '>', $request -> datereporting)

->orWhere(function($covid_stage_2_1)use ($request) 
{ 
      $covid_stage_2_1  
      ->where('ward_admissions.date', '<=', $request -> datereporting)
      ->where('ward_admissions.adm_stage', '=', 2)
      ->where('vaccination_statuses.date_first','<>', null)                
      ->where('vaccination_statuses.date_second','=', null)
      ->where('ward_discharges.reg_number');
})
->get(array(
DB::raw('COUNT(*) as "count"')
));

$covid_stage_3_1= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->join('vaccination_statuses','vaccination_statuses.patient_kp_passport','patients.kp_passport')
->leftJoin('case_samplings','ward_admissions.kp_passport','=','case_samplings.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number');

$statistic_stage_3_1 =  $covid_stage_3_1 ->where('ward_admissions.date', '<=', $request -> datereporting)
->where('ward_admissions.adm_stage', '=', 3)
->where('vaccination_statuses.date_first','<>', null)                
->where('vaccination_statuses.date_second','=', null)
->where('ward_discharges.date_dc', '>', $request -> datereporting)

->orWhere(function($covid_stage_3_1)use ($request) 
{ 
      $covid_stage_3_1  
      ->where('ward_admissions.date', '<=', $request -> datereporting)
      ->where('ward_admissions.adm_stage', '=', 3)
      ->where('vaccination_statuses.date_first','<>', null)                
      ->where('vaccination_statuses.date_second','=', null)
      ->where('ward_discharges.reg_number');
})
->get(array(
DB::raw('COUNT(*) as "count"')
));

$covid_stage_4_1= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->join('vaccination_statuses','vaccination_statuses.patient_kp_passport','patients.kp_passport')
->leftJoin('case_samplings','ward_admissions.kp_passport','=','case_samplings.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number');

$statistic_stage_4_1 =  $covid_stage_4_1 ->where('ward_admissions.date', '<=', $request -> datereporting)
->where('ward_admissions.adm_stage', '=', 4)
->where('vaccination_statuses.date_first','<>', null)                
->where('vaccination_statuses.date_second','=', null)
->where('ward_discharges.date_dc', '>', $request -> datereporting)

->orWhere(function($covid_stage_4_1)use ($request) 
{ 
      $covid_stage_4_1  
      ->where('ward_admissions.date', '<=', $request -> datereporting)
      ->where('ward_admissions.adm_stage', '=', 4)
      ->where('vaccination_statuses.date_first','<>', null)                
      ->where('vaccination_statuses.date_second','=', null)
      ->where('ward_discharges.reg_number');
})
->get(array(
DB::raw('COUNT(*) as "count"')
));
$covid_stage_5_1= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->join('vaccination_statuses','vaccination_statuses.patient_kp_passport','patients.kp_passport')
->leftJoin('case_samplings','ward_admissions.kp_passport','=','case_samplings.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number');

$statistic_stage_5_1 =  $covid_stage_5_1 ->where('ward_admissions.date', '<=', $request -> datereporting)
->where('ward_admissions.adm_stage', '=', 5)
->where('vaccination_statuses.date_first','<>', null)                
->where('vaccination_statuses.date_second','=', null)
->where('ward_discharges.date_dc', '>', $request -> datereporting)

->orWhere(function($covid_stage_5_1)use ($request) 
{ 
      $covid_stage_5_1  
      ->where('ward_admissions.date', '<=', $request -> datereporting)
      ->where('ward_admissions.adm_stage', '=', 5)
      ->where('vaccination_statuses.date_first','<>', null)                
      ->where('vaccination_statuses.date_second','=', null)
      ->where('ward_discharges.reg_number');
})
->get(array(
DB::raw('COUNT(*) as "count"')
));

$covid_stage_1_2= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->join('vaccination_statuses','vaccination_statuses.patient_kp_passport','patients.kp_passport')
->leftJoin('case_samplings','ward_admissions.kp_passport','=','case_samplings.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number');

$statistic_stage_1_2 =  $covid_stage_1_2 ->where('ward_admissions.date', '<=', $request -> datereporting)
->where('ward_admissions.adm_stage', '=', 1)            
->where('vaccination_statuses.date_second','<>', null)
->where('ward_discharges.date_dc', '>', $request -> datereporting)

->orWhere(function($covid_stage_1_2)use ($request) 
{ 
      $covid_stage_1_2  
      ->where('ward_admissions.date', '<=', $request -> datereporting)
      ->where('ward_admissions.adm_stage', '=', 1)                	
      ->where('vaccination_statuses.date_second','<>', null)
      ->where('ward_discharges.reg_number');
})
->get(array(
DB::raw('COUNT(*) as "count"')
));

$covid_stage_2_2= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->join('vaccination_statuses','vaccination_statuses.patient_kp_passport','patients.kp_passport')
->leftJoin('case_samplings','ward_admissions.kp_passport','=','case_samplings.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number');

$statistic_stage_2_2 =  $covid_stage_2_2 ->where('ward_admissions.date', '<=', $request -> datereporting)
->where('ward_admissions.adm_stage', '=', 2)
->where('vaccination_statuses.date_second','<>', null)
->where('ward_discharges.date_dc', '>', $request -> datereporting)

->orWhere(function($covid_stage_2_2)use ($request) 
{ 
      $covid_stage_2_2  
      ->where('ward_admissions.date', '<=', $request -> datereporting)
      ->where('ward_admissions.adm_stage', '=', 2)                	
      ->where('vaccination_statuses.date_second','<>', null)
      ->where('ward_discharges.reg_number');
})
->get(array(
DB::raw('COUNT(*) as "count"')
));

$covid_stage_3_2= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->join('vaccination_statuses','vaccination_statuses.patient_kp_passport','patients.kp_passport')
->leftJoin('case_samplings','ward_admissions.kp_passport','=','case_samplings.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number');

$statistic_stage_3_2 =  $covid_stage_3_2 ->where('ward_admissions.date', '<=', $request -> datereporting)
->where('ward_admissions.adm_stage', '=', 3)
->where('vaccination_statuses.date_second','<>', null)
->where('ward_discharges.date_dc', '>', $request -> datereporting)

->orWhere(function($covid_stage_3_2)use ($request) 
{ 
      $covid_stage_3_2  
      ->where('ward_admissions.date', '<=', $request -> datereporting)
      ->where('ward_admissions.adm_stage', '=', 3)                	
      ->where('vaccination_statuses.date_second','<>', null)
      ->where('ward_discharges.reg_number');
})
->get(array(
DB::raw('COUNT(*) as "count"')
));


$covid_stage_4_2= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->join('vaccination_statuses','vaccination_statuses.patient_kp_passport','patients.kp_passport')
->leftJoin('case_samplings','ward_admissions.kp_passport','=','case_samplings.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number');

$statistic_stage_4_2 =  $covid_stage_4_2 ->where('ward_admissions.date', '<=', $request -> datereporting)
->where('ward_admissions.adm_stage', '=', 4)
->where('vaccination_statuses.date_second','<>', null)
->where('ward_discharges.date_dc', '>', $request -> datereporting)

->orWhere(function($covid_stage_4_2)use ($request) 
{ 
      $covid_stage_4_2  
      ->where('ward_admissions.date', '<=', $request -> datereporting)
      ->where('ward_admissions.adm_stage', '=', 4)                	
      ->where('vaccination_statuses.date_second','<>', null)
      ->where('ward_discharges.reg_number');
})
->get(array(
DB::raw('COUNT(*) as "count"')
));

$covid_stage_5_2= DB::table('ward_admissions')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')
->join('vaccination_statuses','vaccination_statuses.patient_kp_passport','patients.kp_passport')
->leftJoin('case_samplings','ward_admissions.kp_passport','=','case_samplings.kp_passport')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number');

$statistic_stage_5_2 =  $covid_stage_5_2 ->where('ward_admissions.date', '<=', $request -> datereporting)
->where('ward_admissions.adm_stage', '=', 5)
->where('vaccination_statuses.date_second','<>', null)
->where('ward_discharges.date_dc', '>', $request -> datereporting)

->orWhere(function($covid_stage_5_2)use ($request) 
{ 
      $covid_stage_5_2  
      ->where('ward_admissions.date', '<=', $request -> datereporting)
      ->where('ward_admissions.adm_stage', '=', 5)                	
      ->where('vaccination_statuses.date_second','<>', null)
      ->where('ward_discharges.reg_number');
})
->get(array(
DB::raw('COUNT(*) as "count"')
));


   return response()->json( compact('statistic_covid_male', 'statistic_covid_male_paeds','statistic_covid_female',
   'statistic_covid_female_paeds' ,'statistic_covid_new_admission','statistic_covid_local','statistic_covid_non_local',
   'statistic_covid_new_admission_1',
   'statistic_covid_new_admission_2',
   'statistic_covid_new_admission_3',
   'statistic_covid_new_admission_4',
   'statistic_covid_new_admission_5','statistic_covid_new_discharges','statistic_covid_step_up', 'statistic_covid_death','statistic_covid_home_q',
   'statistic_stage_1', 'statistic_stage_2', 'statistic_stage_3','statistic_stage_4','statistic_stage_5',
   'statistic_stage_1_1', 'statistic_stage_2_1', 'statistic_stage_3_1', 'statistic_stage_4_1', 'statistic_stage_5_1', 'statistic_stage_1_2', 
   'statistic_stage_2_2', 'statistic_stage_3_2', 'statistic_stage_4_2', 'statistic_stage_5_2'
  ));
}

}


