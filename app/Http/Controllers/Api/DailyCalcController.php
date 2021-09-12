<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\admission as ModelsAdmission;
use App\Models\case_reg;

class DailyCalcController extends Controller
{
    public function CovidMale(Request $request)

    {
       
        $admission= DB::table('admissions')
       ->join('patients','admissions.kp_passport','patients.kp_passport')
       ->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
       
       ->where('patients.gender', '=','LELAKI')
       ->where('patients.age', '>','12')
       ->where('admissions.pkrc', '=', $request -> pkrc)
       ->where('admissions.adm_diagnosis', '=', 'COVID-19');
        $statistic =  $admission ->where('admissions.date', '<=', $request -> datereporting)

        ->where('discharges.date_dc', '>', $request -> datereporting)

        ->orWhere(function($admission )use ($request) 
        
        { 
            $admission  
            ->where('admissions.date', '<=', $request -> datereporting)
            ->where('patients.gender', '=','LELAKI')
            ->where('patients.age', '>','12')
            ->where('discharges.reg_number')
            ->where('admissions.adm_diagnosis', '=', 'COVID-19')
            ->where('admissions.pkrc', '=', $request -> pkrc);
        })
        ->get(array(
            DB::raw('COUNT(*) as "count"')
       ));
          return response()->json($statistic);
    }

    public function CovidMalePaeds(Request $request)

    {
       
        $admission= DB::table('admissions')
       ->join('patients','admissions.kp_passport','patients.kp_passport')
       ->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
       
       ->where('patients.gender', '=','LELAKI')
       ->where('patients.age', '<=','12')
       ->where('admissions.adm_diagnosis', '=', 'COVID-19')
       ->where('admissions.pkrc', '=', $request -> pkrc);
       
        $statistic =  $admission ->where('admissions.date', '<=', $request -> datereporting)

        ->where('discharges.date_dc', '>', $request -> datereporting)

        ->orWhere(function($admission )use ($request) 
        
        { 
            $admission  ->where('patients.gender', '=','LELAKI')
            ->where('admissions.date', '<=', $request -> datereporting)
            ->where('patients.age', '<=','12')
            ->where('discharges.reg_number')
            ->where('admissions.adm_diagnosis', '=', 'COVID-19')
            ->where('admissions.pkrc', '=', $request -> pkrc);
        })

       // ->select('patients.name','patients.kp_passport','patients.gender','patients.age','admissions.date',
      //  'discharges.date_dc')
       // ->get();
        ->get(array(
        DB::raw('COUNT(*) as "count"')
         ));
          return response()->json($statistic);
    }

    public function CovidFemale(Request $request)

    {      
        $admission= DB::table('admissions')
       ->join('patients','admissions.kp_passport','patients.kp_passport')
       ->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
       ->where('patients.gender', '=','PEREMPUAN')
       ->where('patients.age', '>','12')
       ->where('admissions.adm_diagnosis', '=', 'COVID-19')
       ->where('admissions.pkrc', '=', $request -> pkrc);
       
        $statistic =  $admission ->where('admissions.date', '<=', $request -> datereporting)

        ->where('discharges.date_dc', '>', $request -> datereporting)

        ->orWhere(function($admission )use ($request) 
        
        { 
            $admission  
            ->where('admissions.date', '<=', $request -> datereporting)
            ->where('patients.gender', '=','PEREMPUAN')
            ->where('patients.age', '>','12')
            ->where('discharges.reg_number')
            ->where('admissions.adm_diagnosis', '=', 'COVID-19')
            ->where('admissions.pkrc', '=', $request -> pkrc);
        })
        ->get(array(
            DB::raw('COUNT(*) as "count"')
       ));
          return response()->json($statistic);
    }
    public function CovidFemalePaeds(Request $request)

    {      
        $admission= DB::table('admissions')
       ->join('patients','admissions.kp_passport','patients.kp_passport')
       ->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
       
       ->where('patients.gender', '=','PEREMPUAN')
       ->where('patients.age', '<=','12')
       ->where('admissions.adm_diagnosis', '=', 'COVID-19')
       ->where('admissions.pkrc', '=', $request -> pkrc);
       
        $statistic =  $admission ->where('admissions.date', '<=', $request -> datereporting)

        ->where('discharges.date_dc', '>', $request -> datereporting)

        ->orWhere(function($admission )use ($request) 
        
        { 
            $admission  
            ->where('admissions.date', '<=', $request -> datereporting)
            ->where('patients.gender', '=','PEREMPUAN')
            ->where('patients.age', '<=','12')
            ->where('discharges.reg_number')
            ->where('admissions.adm_diagnosis', '=', 'COVID-19')
            ->where('admissions.pkrc', '=', $request -> pkrc);
        })
        ->get(array(
            DB::raw('COUNT(*) as "count"')
       ));
          return response()->json($statistic);
    }

    public function stageOne(Request $request)

    {      
        $admission= DB::table('admissions')
       ->join('patients','admissions.kp_passport','patients.kp_passport')
       ->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
   
       ->where('admissions.pkrc', '=', $request -> pkrc)

       ->where('admissions.adm_stage', 1);
        $statistic =  $admission ->where('admissions.date', '<=', $request -> datereporting)

        ->where('discharges.date_dc', '>', $request -> datereporting)

        ->orWhere(function($admission )use ($request) 
        
        { 
            $admission
            ->where('admissions.date', '<=', $request -> datereporting)
            ->where('admissions.adm_stage', 1)
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
    public function stageTwo(Request $request)

    {      
        $admission= DB::table('admissions')
       ->join('patients','admissions.kp_passport','patients.kp_passport')
       ->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
       
   
       ->where('admissions.pkrc', '=', $request -> pkrc)

       ->where('admissions.adm_stage', 2);
        $statistic =  $admission ->where('admissions.date', '<=', $request -> datereporting)

        ->where('discharges.date_dc', '>', $request -> datereporting)

        ->orWhere(function($admission )use ($request) 
        
        { 
            $admission
            ->where('admissions.date', '<=', $request -> datereporting)
            ->where('admissions.adm_stage', 2)
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

    public function stageThree(Request $request)

    {      
        $admission= DB::table('admissions')
       ->join('patients','admissions.kp_passport','patients.kp_passport')
       ->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
       
   
       ->where('admissions.pkrc', '=', $request -> pkrc)

       ->where('admissions.adm_stage', 3);
        $statistic =  $admission ->where('admissions.date', '<=', $request -> datereporting)

        ->where('discharges.date_dc', '>', $request -> datereporting)

        ->orWhere(function($admission )use ($request) 
        
        { 
            $admission
            ->where('admissions.date', '<=', $request -> datereporting)
            ->where('admissions.adm_stage', 3)
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

    public function stageFour(Request $request)

    {      
        $admission= DB::table('admissions')
       ->join('patients','admissions.kp_passport','patients.kp_passport')
       ->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
       
   
       ->where('admissions.pkrc', '=', $request -> pkrc)

       ->where('admissions.adm_stage', 4);
        $statistic =  $admission ->where('admissions.date', '<=', $request -> datereporting)

        ->where('discharges.date_dc', '>', $request -> datereporting)

        ->orWhere(function($admission )use ($request) 
        
        { 
            $admission
            ->where('admissions.date', '<=', $request -> datereporting)
            ->where('admissions.adm_stage', 4)
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


    public function stageFive(Request $request)

    {      
        $admission= DB::table('admissions')
       ->join('patients','admissions.kp_passport','patients.kp_passport')
       ->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
       
   
       ->where('admissions.pkrc', '=', $request -> pkrc)

       ->where('admissions.adm_stage', 5);
        $statistic =  $admission 
        ->where('admissions.date', '<=', $request -> datereporting)
        ->where('discharges.date_dc', '>', $request -> datereporting)
        ->orWhere(function($admission )use ($request) 
        
        { 
            $admission
            ->where('admissions.date', '<=', $request -> datereporting)
            ->where('admissions.adm_stage', 5)
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

    public function newAdmission(Request $request)

    {      
        $admission= DB::table('admissions')
       ->join('patients','admissions.kp_passport','patients.kp_passport')
       ->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
       
       ->where('admissions.adm_diagnosis', '=', 'COVID-19')
       ->where('admissions.pkrc', '=', $request -> pkrc);

        $statistic =  $admission ->where('admissions.date', '=', $request -> datereporting)

        ->where('discharges.date_dc', '>', $request -> datereporting)

        ->orWhere(function($admission )use ($request) 
        
        { 
            $admission
            ->where('admissions.adm_diagnosis', '=', 'COVID-19')
            ->where('admissions.date', '=', $request -> datereporting)
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

    
    public function stepUp(Request $request)

    {      
        $admission= DB::table('admissions')
       ->join('patients','admissions.kp_passport','patients.kp_passport')
       ->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
       ->where('admissions.adm_diagnosis', '=', 'COVID-19')
   
       ->where('admissions.pkrc', '=', $request -> pkrc);

        $statistic =  $admission ->where('admissions.date', '<', $request -> datereporting)

        ->where('discharges.date_dc', '=', $request -> datereporting)
        ->where('discharges.type_dc', '=', 'Ditukar ke Hospital Lain')
    
     //  ->select('patients.name','patients.kp_passport','patients.gender','patients.age','admissions.date','admissions.adm_stage' ,
     //  'discharges.date_dc')
     //  ->get();
     ->get(array(
        DB::raw('COUNT(*) as "count"')
   ));
          return response()->json($statistic);
    }
        
    public function statDischarges(Request $request)

    {      
        $admission= DB::table('admissions')
       ->join('patients','admissions.kp_passport','patients.kp_passport')
       ->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')

       
       ->where('admissions.adm_diagnosis', '=', 'COVID-19')
       ->where('admissions.pkrc', '=', $request -> pkrc);

        $statistic =  $admission ->where('admissions.date', '<', $request -> datereporting)

        ->where('discharges.date_dc', '=', $request -> datereporting)
        ->where('discharges.type_dc', '=', 'Balik ke Rumah')
    
     //  ->select('patients.name','patients.kp_passport','patients.gender','patients.age','admissions.date','admissions.adm_stage' ,
     //  'discharges.date_dc')
     //  ->get();
     ->get(array(
        DB::raw('COUNT(*) as "count"')
   ));
          return response()->json($statistic);
    }

    public function HQ(Request $request)

    {      
        $admission= DB::table('admissions')
       ->join('patients','admissions.kp_passport','patients.kp_passport')
       ->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
       ->where('admissions.adm_diagnosis', '=', 'COVID-19')
       
   
       ->where('admissions.pkrc', '=', $request -> pkrc);

        $statistic =  $admission ->where('admissions.date', '<', $request -> datereporting)

        ->where('discharges.date_dc', '=', $request -> datereporting)
        ->where('discharges.type_dc', '=', 'Home Quarantine')
    
     //  ->select('patients.name','patients.kp_passport','patients.gender','patients.age','admissions.date','admissions.adm_stage' ,
     //  'discharges.date_dc')
     //  ->get();
     ->get(array(
        DB::raw('COUNT(*) as "count"')
   ));
          return response()->json($statistic);
    }

    public function WN(Request $request)

    {      
     
        $admission= DB::table('admissions')
       ->join('patients','admissions.kp_passport','patients.kp_passport')
       ->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')

       
       ->where('patients.nationality', '=','MALAYSIA')
       ->where('admissions.pkrc', '=', $request -> pkrc);
       
        $statistic =  $admission ->where('admissions.date', '<=', $request -> datereporting)

        ->where('discharges.date_dc', '>', $request -> datereporting)

        ->orWhere(function($admission )use ($request) 
        
        { 
            $admission ->where('patients.nationality', '=','MALAYSIA')
            ->where('admissions.date', '<=', $request -> datereporting)
           
            ->where('discharges.reg_number')
            ->where('admissions.pkrc', '=', $request -> pkrc);
        })
        ->get(array(
            DB::raw('COUNT(*) as "count"')
       ));
          return response()->json($statistic);
    }
    
    public function BWN(Request $request)

    {      
     
        $admission= DB::table('admissions')
       ->join('patients','admissions.kp_passport','patients.kp_passport')
       ->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
 
       
       ->where('patients.nationality', '<>','MALAYSIA')
       ->where('admissions.pkrc', '=', $request -> pkrc);
       
        $statistic =  $admission ->where('admissions.date', '<=', $request -> datereporting)

        ->where('discharges.date_dc', '>', $request -> datereporting)

        ->orWhere(function($admission )use ($request) 
        
        { 
            $admission ->where('patients.nationality', '<>','MALAYSIA')
            ->where('admissions.date', '<=', $request -> datereporting)
           
            ->where('discharges.reg_number')
            ->where('admissions.pkrc', '=', $request -> pkrc);
        })
        ->get(array(
            DB::raw('COUNT(*) as "count"')
       ));
          return response()->json($statistic);
    }

    // stage 1 vaccination
    public function stageOneVaccineOne(Request $request)

    {      
        $admission= DB::table('admissions')
        ->join('patients','admissions.kp_passport','patients.kp_passport')
        ->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
        ->leftJoin('case_samplings','admissions.kp_passport','=','case_samplings.kp_passport')
    
        ->where('admissions.pkrc', '=', $request -> pkrc)
 
        ->where('admissions.adm_stage', 1);
     
         $statistic =  $admission 
        ->where('admissions.date', '<=', $request -> datereporting)
         ->where('discharges.date_dc', '>', $request -> datereporting)
        ->where('case_samplings.first_dose_date','<>', null)
        
        ->where('case_samplings.second_dose_date','=', null)
         ->orWhere(function($admission )use ($request) 
         
         { 
             $admission
            ->where('admissions.date', '<=', $request -> datereporting)
             ->where('admissions.adm_stage', 1)
             ->where('discharges.reg_number')
             ->where('case_samplings.first_dose_date','<>', null)
             
             ->where('case_samplings.second_dose_date','=', null)
             ->where('admissions.pkrc', '=', $request -> pkrc);
         })
      // ->select('patients.name','patients.kp_passport','patients.gender','patients.age','admissions.date','admissions.adm_stage' ,
      // 'discharges.date_dc', 'case_samplings.first_dose_date','case_samplings.second_dose_date')
      // ->get();
      ->get(array(
         DB::raw('COUNT(*) as "count"')
             ));
           return response()->json($statistic);
    }
    public function stageOneVaccineTwo(Request $request)

    {      
        $admission= DB::table('admissions')
        ->join('patients','admissions.kp_passport','patients.kp_passport')
        ->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
        ->leftJoin('case_samplings','admissions.kp_passport','=','case_samplings.kp_passport')
    
        ->where('admissions.pkrc', '=', $request -> pkrc)
 
        ->where('admissions.adm_stage', 1);
     
         $statistic =  $admission 
        ->where('admissions.date', '<=', $request -> datereporting)
         ->where('discharges.date_dc', '>', $request -> datereporting)
        
        ->where('case_samplings.second_dose_date','<>', null)
         ->orWhere(function($admission )use ($request) 
         
         { 
             $admission
            ->where('admissions.date', '<=', $request -> datereporting)
             ->where('admissions.adm_stage', 1)
             ->where('discharges.reg_number')
             
             ->where('case_samplings.second_dose_date','<>', null)
             ->where('admissions.pkrc', '=', $request -> pkrc);
         })
      // ->select('patients.name','patients.kp_passport','patients.gender','patients.age','admissions.date','admissions.adm_stage' ,
      // 'discharges.date_dc', 'case_samplings.first_dose_date','case_samplings.second_dose_date')
      // ->get();
      ->get(array(
         DB::raw('COUNT(*) as "count"')
             ));
           return response()->json($statistic);
    }

    public function stageOneVaccineNone(Request $request)

    {      
        $admission= DB::table('admissions')
        ->join('patients','admissions.kp_passport','patients.kp_passport')
        ->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
        ->leftJoin('case_samplings','admissions.kp_passport','=','case_samplings.kp_passport')
    
        ->where('admissions.pkrc', '=', $request -> pkrc)
 
        ->where('admissions.adm_stage', 1);
     
         $statistic =  $admission 
        ->where('admissions.date', '<=', $request -> datereporting)
         ->where('discharges.date_dc', '>', $request -> datereporting)
        
        ->where('case_samplings.first_dose_date','=', null)
         ->orWhere(function($admission )use ($request) 
         
         { 
             $admission
            ->where('admissions.date', '<=', $request -> datereporting)
             ->where('admissions.adm_stage', 1)
             ->where('discharges.reg_number')
             
             ->where('case_samplings.first_dose_date','=', null)
             ->where('admissions.pkrc', '=', $request -> pkrc);
         })
      // ->select('patients.name','patients.kp_passport','patients.gender','patients.age','admissions.date','admissions.adm_stage' ,
      // 'discharges.date_dc', 'case_samplings.first_dose_date','case_samplings.second_dose_date')
      // ->get();
      ->get(array(
         DB::raw('COUNT(*) as "count"')
      
        ));
        return response()->json($statistic);
    }
        // stage 2 vaccination
        public function stageTwoVaccineOne(Request $request)

        {      
            $admission= DB::table('admissions')
            ->join('patients','admissions.kp_passport','patients.kp_passport')
            ->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
            ->leftJoin('case_samplings','admissions.kp_passport','=','case_samplings.kp_passport')
        
            ->where('admissions.pkrc', '=', $request -> pkrc)
     
            ->where('admissions.adm_stage', 2);
         
             $statistic =  $admission 
            ->where('admissions.date', '<=', $request -> datereporting)
             ->where('discharges.date_dc', '>', $request -> datereporting)
            ->where('case_samplings.first_dose_date','<>', null)
            
            ->where('case_samplings.second_dose_date','=', null)
             ->orWhere(function($admission )use ($request) 
             
             { 
                 $admission
                ->where('admissions.date', '<=', $request -> datereporting)
                 ->where('admissions.adm_stage', 2)
                 ->where('discharges.reg_number')
                 ->where('case_samplings.first_dose_date','<>', null)
                 
                 ->where('case_samplings.second_dose_date','=', null)
                 ->where('admissions.pkrc', '=', $request -> pkrc);
             })
          // ->select('patients.name','patients.kp_passport','patients.gender','patients.age','admissions.date','admissions.adm_stage' ,
          // 'discharges.date_dc', 'case_samplings.first_dose_date','case_samplings.second_dose_date')
          // ->get();
          ->get(array(
             DB::raw('COUNT(*) as "count"')
                 ));
               return response()->json($statistic);
        }
        public function stageTwoVaccineTwo(Request $request)
    
        {      
            $admission= DB::table('admissions')
            ->join('patients','admissions.kp_passport','patients.kp_passport')
            ->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
            ->leftJoin('case_samplings','admissions.kp_passport','=','case_samplings.kp_passport')
        
            ->where('admissions.pkrc', '=', $request -> pkrc)
     
            ->where('admissions.adm_stage', 2);
         
             $statistic =  $admission 
            ->where('admissions.date', '<=', $request -> datereporting)
             ->where('discharges.date_dc', '>', $request -> datereporting)
            
            ->where('case_samplings.second_dose_date','<>', null)
             ->orWhere(function($admission )use ($request) 
             
             { 
                 $admission
                ->where('admissions.date', '<=', $request -> datereporting)
                 ->where('admissions.adm_stage', 2)
                 ->where('discharges.reg_number')
                 
                 ->where('case_samplings.second_dose_date','<>', null)
                 ->where('admissions.pkrc', '=', $request -> pkrc);
             })
          // ->select('patients.name','patients.kp_passport','patients.gender','patients.age','admissions.date','admissions.adm_stage' ,
          // 'discharges.date_dc', 'case_samplings.first_dose_date','case_samplings.second_dose_date')
          // ->get();
          ->get(array(
             DB::raw('COUNT(*) as "count"')
                 ));
               return response()->json($statistic);
        }
    
        public function stageTwoVaccineNone(Request $request)
    
        {      
            $admission= DB::table('admissions')
            ->join('patients','admissions.kp_passport','patients.kp_passport')
            ->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
            ->leftJoin('case_samplings','admissions.kp_passport','=','case_samplings.kp_passport')
        
            ->where('admissions.pkrc', '=', $request -> pkrc)
     
            ->where('admissions.adm_stage', 2);
         
             $statistic =  $admission 
            ->where('admissions.date', '<=', $request -> datereporting)
             ->where('discharges.date_dc', '>', $request -> datereporting)
            
            ->where('case_samplings.first_dose_date','=', null)
             ->orWhere(function($admission )use ($request) 
             
             { 
                 $admission
                ->where('admissions.date', '<=', $request -> datereporting)
                 ->where('admissions.adm_stage', 2)
                 ->where('discharges.reg_number')
                 
                 ->where('case_samplings.first_dose_date','=', null)
                 ->where('admissions.pkrc', '=', $request -> pkrc);
             })
          // ->select('patients.name','patients.kp_passport','patients.gender','patients.age','admissions.date','admissions.adm_stage' ,
          // 'discharges.date_dc', 'case_samplings.first_dose_date','case_samplings.second_dose_date')
          // ->get();
          ->get(array(
             DB::raw('COUNT(*) as "count"')
          
            ));
            return response()->json($statistic);
        }
    
       // stage 3 vaccination
       public function stageThreeVaccineOne(Request $request)

       {      
           $admission= DB::table('admissions')
           ->join('patients','admissions.kp_passport','patients.kp_passport')
           ->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
           ->leftJoin('case_samplings','admissions.kp_passport','=','case_samplings.kp_passport')
       
           ->where('admissions.pkrc', '=', $request -> pkrc)
    
           ->where('admissions.adm_stage', 3);
        
            $statistic =  $admission 
           ->where('admissions.date', '<=', $request -> datereporting)
            ->where('discharges.date_dc', '>', $request -> datereporting)
           ->where('case_samplings.first_dose_date','<>', null)
           
           ->where('case_samplings.second_dose_date','=', null)
            ->orWhere(function($admission )use ($request) 
            
            { 
                $admission
               ->where('admissions.date', '<=', $request -> datereporting)
                ->where('admissions.adm_stage', 3)
                ->where('discharges.reg_number')
                ->where('case_samplings.first_dose_date','<>', null)
                
                ->where('case_samplings.second_dose_date','=', null)
                ->where('admissions.pkrc', '=', $request -> pkrc);
            })
         // ->select('patients.name','patients.kp_passport','patients.gender','patients.age','admissions.date','admissions.adm_stage' ,
         // 'discharges.date_dc', 'case_samplings.first_dose_date','case_samplings.second_dose_date')
         // ->get();
         ->get(array(
            DB::raw('COUNT(*) as "count"')
                ));
              return response()->json($statistic);
       }
       public function stageThreeVaccineTwo(Request $request)
   
       {      
           $admission= DB::table('admissions')
           ->join('patients','admissions.kp_passport','patients.kp_passport')
           ->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
           ->leftJoin('case_samplings','admissions.kp_passport','=','case_samplings.kp_passport')
       
           ->where('admissions.pkrc', '=', $request -> pkrc)
    
           ->where('admissions.adm_stage', 3);
        
            $statistic =  $admission 
           ->where('admissions.date', '<=', $request -> datereporting)
            ->where('discharges.date_dc', '>', $request -> datereporting)
           
           ->where('case_samplings.second_dose_date','<>', null)
            ->orWhere(function($admission )use ($request) 
            
            { 
                $admission
               ->where('admissions.date', '<=', $request -> datereporting)
                ->where('admissions.adm_stage', 3)
                ->where('discharges.reg_number')
                
                ->where('case_samplings.second_dose_date','<>', null)
                ->where('admissions.pkrc', '=', $request -> pkrc);
            })
         // ->select('patients.name','patients.kp_passport','patients.gender','patients.age','admissions.date','admissions.adm_stage' ,
         // 'discharges.date_dc', 'case_samplings.first_dose_date','case_samplings.second_dose_date')
         // ->get();
         ->get(array(
            DB::raw('COUNT(*) as "count"')
                ));
              return response()->json($statistic);
       }
   
       public function stageThreeVaccineNone(Request $request)
   
       {      
           $admission= DB::table('admissions')
           ->join('patients','admissions.kp_passport','patients.kp_passport')
           ->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
           ->leftJoin('case_samplings','admissions.kp_passport','=','case_samplings.kp_passport')
       
           ->where('admissions.pkrc', '=', $request -> pkrc)
    
           ->where('admissions.adm_stage', 3);
        
            $statistic =  $admission 
           ->where('admissions.date', '<=', $request -> datereporting)
            ->where('discharges.date_dc', '>', $request -> datereporting)
           
           ->where('case_samplings.first_dose_date','=', null)
            ->orWhere(function($admission )use ($request) 
            
            { 
                $admission
               ->where('admissions.date', '<=', $request -> datereporting)
                ->where('admissions.adm_stage', 3)
                ->where('discharges.reg_number')
                
                ->where('case_samplings.first_dose_date','=', null)
                ->where('admissions.pkrc', '=', $request -> pkrc);
            })
         // ->select('patients.name','patients.kp_passport','patients.gender','patients.age','admissions.date','admissions.adm_stage' ,
         // 'discharges.date_dc', 'case_samplings.first_dose_date','case_samplings.second_dose_date')
         // ->get();
         ->get(array(
            DB::raw('COUNT(*) as "count"')
         
           ));
           return response()->json($statistic);
       }
  
       // stage 4 vaccination
       public function stageFourVaccineOne(Request $request)

       {      
           $admission= DB::table('admissions')
           ->join('patients','admissions.kp_passport','patients.kp_passport')
           ->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
           ->leftJoin('case_samplings','admissions.kp_passport','=','case_samplings.kp_passport')
       
           ->where('admissions.pkrc', '=', $request -> pkrc)
    
           ->where('admissions.adm_stage', 4);
        
            $statistic =  $admission 
           ->where('admissions.date', '<=', $request -> datereporting)
            ->where('discharges.date_dc', '>', $request -> datereporting)
           ->where('case_samplings.first_dose_date','<>', null)
           
           ->where('case_samplings.second_dose_date','=', null)
            ->orWhere(function($admission )use ($request) 
            
            { 
                $admission
               ->where('admissions.date', '<=', $request -> datereporting)
                ->where('admissions.adm_stage', 4)
                ->where('discharges.reg_number')
                ->where('case_samplings.first_dose_date','<>', null)
                
                ->where('case_samplings.second_dose_date','=', null)
                ->where('admissions.pkrc', '=', $request -> pkrc);
            })
         // ->select('patients.name','patients.kp_passport','patients.gender','patients.age','admissions.date','admissions.adm_stage' ,
         // 'discharges.date_dc', 'case_samplings.first_dose_date','case_samplings.second_dose_date')
         // ->get();
         ->get(array(
            DB::raw('COUNT(*) as "count"')
                ));
              return response()->json($statistic);
       }
       public function stageFourVaccineTwo(Request $request)
   
       {      
           $admission= DB::table('admissions')
           ->join('patients','admissions.kp_passport','patients.kp_passport')
           ->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
           ->leftJoin('case_samplings','admissions.kp_passport','=','case_samplings.kp_passport')
       
           ->where('admissions.pkrc', '=', $request -> pkrc)
    
           ->where('admissions.adm_stage', 4);
        
            $statistic =  $admission 
           ->where('admissions.date', '<=', $request -> datereporting)
            ->where('discharges.date_dc', '>', $request -> datereporting)
           
           ->where('case_samplings.second_dose_date','<>', null)
            ->orWhere(function($admission )use ($request) 
            
            { 
                $admission
               ->where('admissions.date', '<=', $request -> datereporting)
                ->where('admissions.adm_stage', 4)
                ->where('discharges.reg_number')
                
                ->where('case_samplings.second_dose_date','<>', null)
                ->where('admissions.pkrc', '=', $request -> pkrc);
            })
         // ->select('patients.name','patients.kp_passport','patients.gender','patients.age','admissions.date','admissions.adm_stage' ,
         // 'discharges.date_dc', 'case_samplings.first_dose_date','case_samplings.second_dose_date')
         // ->get();
         ->get(array(
            DB::raw('COUNT(*) as "count"')
                ));
              return response()->json($statistic);
       }
   
       public function stageFourVaccineNone(Request $request)
   
       {      
           $admission= DB::table('admissions')
           ->join('patients','admissions.kp_passport','patients.kp_passport')
           ->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
           ->leftJoin('case_samplings','admissions.kp_passport','=','case_samplings.kp_passport')
       
           ->where('admissions.pkrc', '=', $request -> pkrc)
    
           ->where('admissions.adm_stage', 4);
        
            $statistic =  $admission 
           ->where('admissions.date', '<=', $request -> datereporting)
            ->where('discharges.date_dc', '>', $request -> datereporting)
           
           ->where('case_samplings.first_dose_date','=', null)
            ->orWhere(function($admission )use ($request) 
            
            { 
                $admission
               ->where('admissions.date', '<=', $request -> datereporting)
                ->where('admissions.adm_stage', 4)
                ->where('discharges.reg_number')
                
                ->where('case_samplings.first_dose_date','=', null)
                ->where('admissions.pkrc', '=', $request -> pkrc);
            })
         // ->select('patients.name','patients.kp_passport','patients.gender','patients.age','admissions.date','admissions.adm_stage' ,
         // 'discharges.date_dc', 'case_samplings.first_dose_date','case_samplings.second_dose_date')
         // ->get();
         ->get(array(
            DB::raw('COUNT(*) as "count"')
         
           ));
           return response()->json($statistic);
       }

            // stage 5 vaccination
            public function stageFiveVaccineOne(Request $request)

            {      
                $admission= DB::table('admissions')
                ->join('patients','admissions.kp_passport','patients.kp_passport')
                ->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
                ->leftJoin('case_samplings','admissions.kp_passport','=','case_samplings.kp_passport')
            
                ->where('admissions.pkrc', '=', $request -> pkrc)
         
                ->where('admissions.adm_stage', 5);
             
                 $statistic =  $admission 
                ->where('admissions.date', '<=', $request -> datereporting)
                 ->where('discharges.date_dc', '>', $request -> datereporting)
                ->where('case_samplings.first_dose_date','<>', null)
                
                ->where('case_samplings.second_dose_date','=', null)
                 ->orWhere(function($admission )use ($request) 
                 
                 { 
                     $admission
                    ->where('admissions.date', '<=', $request -> datereporting)
                     ->where('admissions.adm_stage', 5)
                     ->where('discharges.reg_number')
                     ->where('case_samplings.first_dose_date','<>', null)
                     
                     ->where('case_samplings.second_dose_date','=', null)
                     ->where('admissions.pkrc', '=', $request -> pkrc);
                 })
              // ->select('patients.name','patients.kp_passport','patients.gender','patients.age','admissions.date','admissions.adm_stage' ,
              // 'discharges.date_dc', 'case_samplings.first_dose_date','case_samplings.second_dose_date')
              // ->get();
              ->get(array(
                 DB::raw('COUNT(*) as "count"')
                     ));
                   return response()->json($statistic);
            }
            public function stageFiveVaccineTwo(Request $request)
        
            {      
                $admission= DB::table('admissions')
                ->join('patients','admissions.kp_passport','patients.kp_passport')
                ->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
                ->leftJoin('case_samplings','admissions.kp_passport','=','case_samplings.kp_passport')
            
                ->where('admissions.pkrc', '=', $request -> pkrc)
         
                ->where('admissions.adm_stage', 5);
             
                 $statistic =  $admission 
                ->where('admissions.date', '<=', $request -> datereporting)
                 ->where('discharges.date_dc', '>', $request -> datereporting)
                
                ->where('case_samplings.second_dose_date','<>', null)
                 ->orWhere(function($admission )use ($request) 
                 
                 { 
                     $admission
                    ->where('admissions.date', '<=', $request -> datereporting)
                     ->where('admissions.adm_stage', 5)
                     ->where('discharges.reg_number')
                     
                     ->where('case_samplings.second_dose_date','<>', null)
                     ->where('admissions.pkrc', '=', $request -> pkrc);
                 })
              // ->select('patients.name','patients.kp_passport','patients.gender','patients.age','admissions.date','admissions.adm_stage' ,
              // 'discharges.date_dc', 'case_samplings.first_dose_date','case_samplings.second_dose_date')
              // ->get();
              ->get(array(
                 DB::raw('COUNT(*) as "count"')
                     ));
                   return response()->json($statistic);
            }
        
            public function stageFiveVaccineNone(Request $request)
        
            {      
                $admission= DB::table('admissions')
                ->join('patients','admissions.kp_passport','patients.kp_passport')
                ->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
                ->leftJoin('case_samplings','admissions.kp_passport','=','case_samplings.kp_passport')
            
                ->where('admissions.pkrc', '=', $request -> pkrc)
         
                ->where('admissions.adm_stage', 5);
             
                 $statistic =  $admission 
                ->where('admissions.date', '<=', $request -> datereporting)
                 ->where('discharges.date_dc', '>', $request -> datereporting)
                
                ->where('case_samplings.first_dose_date','=', null)
                 ->orWhere(function($admission )use ($request) 
                 
                 { 
                     $admission
                    ->where('admissions.date', '<=', $request -> datereporting)
                     ->where('admissions.adm_stage', 5)
                     ->where('discharges.reg_number')
                     
                     ->where('case_samplings.first_dose_date','=', null)
                     ->where('admissions.pkrc', '=', $request -> pkrc);
                 })
              // ->select('patients.name','patients.kp_passport','patients.gender','patients.age','admissions.date','admissions.adm_stage' ,
              // 'discharges.date_dc', 'case_samplings.first_dose_date','case_samplings.second_dose_date')
              // ->get();
              ->get(array(
                 DB::raw('COUNT(*) as "count"')
              
                ));
                return response()->json($statistic);
            }
// PUI STATISTICS

            public function PUIMale(Request $request)

    {
       
        $admission= DB::table('admissions')
       ->join('patients','admissions.kp_passport','patients.kp_passport')
       ->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
       
       ->where('patients.gender', '=','LELAKI')
       ->where('patients.age', '>','12')
       ->where('admissions.pkrc', '=', $request -> pkrc)
       ->where('admissions.adm_diagnosis', '=', 'PUI');
        $statistic =  $admission ->where('admissions.date', '<=', $request -> datereporting)

        ->where('discharges.date_dc', '>', $request -> datereporting)

        ->orWhere(function($admission )use ($request) 
        
        { 
            $admission  
            ->where('admissions.date', '<=', $request -> datereporting)
            ->where('patients.gender', '=','LELAKI')
            ->where('patients.age', '>','12')
            ->where('discharges.reg_number')
            ->where('admissions.adm_diagnosis', '=', 'PUI')
            ->where('admissions.pkrc', '=', $request -> pkrc);
        })
        ->get(array(
            DB::raw('COUNT(*) as "count"')
       ));
          return response()->json($statistic);
    }

    public function PUIMalePaeds(Request $request)

    {
       
        $admission= DB::table('admissions')
       ->join('patients','admissions.kp_passport','patients.kp_passport')
       ->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
       
       ->where('patients.gender', '=','LELAKI')
       ->where('patients.age', '<=','12')
       ->where('admissions.adm_diagnosis', '=', 'PUI')
       ->where('admissions.pkrc', '=', $request -> pkrc);
       
        $statistic =  $admission ->where('admissions.date', '<=', $request -> datereporting)

        ->where('discharges.date_dc', '>', $request -> datereporting)

        ->orWhere(function($admission )use ($request) 
        
        { 
            $admission  ->where('patients.gender', '=','LELAKI')
            ->where('admissions.date', '<=', $request -> datereporting)
            ->where('patients.age', '<=','12')
            ->where('discharges.reg_number')
            ->where('admissions.adm_diagnosis', '=', 'PUI')
            ->where('admissions.pkrc', '=', $request -> pkrc);
        })

       // ->select('patients.name','patients.kp_passport','patients.gender','patients.age','admissions.date',
      //  'discharges.date_dc')
       // ->get();
        ->get(array(
        DB::raw('COUNT(*) as "count"')
         ));
          return response()->json($statistic);
    }

    public function PUIFemale(Request $request)

    {      
        $admission= DB::table('admissions')
       ->join('patients','admissions.kp_passport','patients.kp_passport')
       ->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
       ->where('patients.gender', '=','PEREMPUAN')
       ->where('patients.age', '>','12')
       ->where('admissions.adm_diagnosis', '=', 'PUI')
       ->where('admissions.pkrc', '=', $request -> pkrc);
       
        $statistic =  $admission ->where('admissions.date', '<=', $request -> datereporting)

        ->where('discharges.date_dc', '>', $request -> datereporting)

        ->orWhere(function($admission )use ($request) 
        
        { 
            $admission  
            ->where('admissions.date', '<=', $request -> datereporting)
            ->where('patients.gender', '=','PEREMPUAN')
            ->where('patients.age', '>','12')
            ->where('discharges.reg_number')
            ->where('admissions.adm_diagnosis', '=', 'PUI')
            ->where('admissions.pkrc', '=', $request -> pkrc);
        })
        ->get(array(
            DB::raw('COUNT(*) as "count"')
       ));
          return response()->json($statistic);
    }
    public function PUIFemalePaeds(Request $request)

    {      
        $admission= DB::table('admissions')
       ->join('patients','admissions.kp_passport','patients.kp_passport')
       ->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
       
       ->where('patients.gender', '=','PEREMPUAN')
       ->where('patients.age', '<=','12')
       ->where('admissions.adm_diagnosis', '=', 'PUI')
       ->where('admissions.pkrc', '=', $request -> pkrc);
       
        $statistic =  $admission ->where('admissions.date', '<=', $request -> datereporting)

        ->where('discharges.date_dc', '>', $request -> datereporting)

        ->orWhere(function($admission )use ($request) 
        
        { 
            $admission  
            ->where('admissions.date', '<=', $request -> datereporting)
            ->where('patients.gender', '=','PEREMPUAN')
            ->where('patients.age', '<=','12')
            ->where('discharges.reg_number')
            ->where('admissions.adm_diagnosis', '=', 'PUI')
            ->where('admissions.pkrc', '=', $request -> pkrc);
        })
        ->get(array(
            DB::raw('COUNT(*) as "count"')
       ));
          return response()->json($statistic);
    }


    public function newAdmissionPUI(Request $request)

    {      
        $admission= DB::table('admissions')
       ->join('patients','admissions.kp_passport','patients.kp_passport')
       ->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
       
       ->where('admissions.adm_diagnosis', '=', 'PUI')
       ->where('admissions.pkrc', '=', $request -> pkrc);

        $statistic =  $admission ->where('admissions.date', '=', $request -> datereporting)

        ->where('discharges.date_dc', '>', $request -> datereporting)

        ->orWhere(function($admission )use ($request) 
        
        { 
            $admission
            ->where('admissions.adm_diagnosis', '=', 'PUI')
            ->where('admissions.date', '=', $request -> datereporting)
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

    
    public function stepUpPUI(Request $request)

    {      
        $admission= DB::table('admissions')
       ->join('patients','admissions.kp_passport','patients.kp_passport')
       ->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
       ->where('admissions.adm_diagnosis', '=', 'PUI')
   
       ->where('admissions.pkrc', '=', $request -> pkrc);

        $statistic =  $admission ->where('admissions.date', '<', $request -> datereporting)

        ->where('discharges.date_dc', '=', $request -> datereporting)
        ->where('discharges.type_dc', '=', 'Ditukar ke Hospital Lain')
    
     //  ->select('patients.name','patients.kp_passport','patients.gender','patients.age','admissions.date','admissions.adm_stage' ,
     //  'discharges.date_dc')
     //  ->get();
     ->get(array(
        DB::raw('COUNT(*) as "count"')
   ));
          return response()->json($statistic);
    }
        
    public function statDischargesPUI(Request $request)

    {      
        $admission= DB::table('admissions')
       ->join('patients','admissions.kp_passport','patients.kp_passport')
       ->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')

       
       ->where('admissions.adm_diagnosis', '=', 'PUI')
       ->where('admissions.pkrc', '=', $request -> pkrc);

        $statistic =  $admission ->where('admissions.date', '<', $request -> datereporting)

        ->where('discharges.date_dc', '=', $request -> datereporting)
        ->where('discharges.type_dc', '=', 'Balik ke Rumah')
    
     //  ->select('patients.name','patients.kp_passport','patients.gender','patients.age','admissions.date','admissions.adm_stage' ,
     //  'discharges.date_dc')
     //  ->get();
     ->get(array(
        DB::raw('COUNT(*) as "count"')
   ));
          return response()->json($statistic);
    }

    public function BOR(Request $request)

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
        });
        $total= $statistic->count();

       
       $bor= ($total/30*100);
          return response()->json(round($bor,2));
    }
}
