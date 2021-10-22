<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class getCensusController extends Controller
{
    public function index(Request $request)
    {

//PKRC
//adult male
$admission= DB::table('admissions')
->join('patients','admissions.kp_passport','patients.kp_passport')
->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
->where('patients.age', '>','12')
->where('patients.gender', '=','LELAKI');

 $statistic_adult_male_pkrc =  $admission ->where('admissions.date', '<', $request -> datereporting)
 ->where('discharges.date_dc', '>', $request -> datereporting)
 ->where('patients.age', '>','12')
 ->where('patients.gender', '=','LELAKI')
 ->orWhere(function($admission )use ($request)  
 { 
     $admission
     ->where('patients.gender', '=','LELAKI')
     ->where('admissions.date', '<', $request -> datereporting)
      ->where('discharges.reg_number')
     ->where('patients.age', '>','12');
 });
$kelmarin_adult_male_pkrc = $statistic_adult_male_pkrc->count();

 //adult female
$admission= DB::table('admissions')
->join('patients','admissions.kp_passport','patients.kp_passport')
->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
->where('patients.age', '>','12')
->where('patients.gender', '=','PEREMPUAN');

 $statistic_adult_female_pkrc =  $admission ->where('admissions.date', '<', $request -> datereporting)
 ->where('discharges.date_dc', '>', $request -> datereporting)
 ->orWhere(function($admission )use ($request)  
 { 
     $admission
     ->where('patients.gender', '=','PEREMPUAN')
     ->where('admissions.date', '<', $request -> datereporting)
      ->where('discharges.reg_number')
     ->where('patients.age', '>','12');
 });
$kelmarin_adult_female_pkrc = $statistic_adult_female_pkrc->count();

//PAEDS male
$admission= DB::table('admissions')
->join('patients','admissions.kp_passport','patients.kp_passport')
->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
->where('patients.age', '<','12')
->where('patients.age', '>=','1')
->where('patients.gender', '=','LELAKI');

 $statistic_paeds_male_pkrc =  $admission ->where('admissions.date', '<', $request -> datereporting)
 ->where('discharges.date_dc', '>', $request -> datereporting)
 ->orWhere(function($admission )use ($request)  
 { 
     $admission
     ->where('patients.gender', '=','LELAKI')
     ->where('admissions.date', '<', $request -> datereporting)
      ->where('discharges.reg_number')
      ->where('patients.age', '<','12')
      ->where('patients.age', '>=','1');
 });
$kelmarin_paeds_male_pkrc = $statistic_paeds_male_pkrc->count();



 //PAEDS female
$admission= DB::table('admissions')
->join('patients','admissions.kp_passport','patients.kp_passport')
->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
->where('patients.age', '<','12')
->where('patients.age', '>=','1')
->where('patients.gender', '=','PEREMPUAN');

 $statistic_paeds_female_pkrc =  $admission ->where('admissions.date', '<', $request -> datereporting)
 ->where('discharges.date_dc', '>', $request -> datereporting)
 ->orWhere(function($admission )use ($request)  
 { 
     $admission
     ->where('patients.gender', '=','PEREMPUAN')
     ->where('admissions.date', '<', $request -> datereporting)
      ->where('discharges.reg_number')
      ->where('patients.age', '<','12')
      ->where('patients.age', '>=','1');
 });

$kelmarin_paeds_female_pkrc = $statistic_paeds_female_pkrc->count();



//NB male
$admission= DB::table('admissions')
->join('patients','admissions.kp_passport','patients.kp_passport')
->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
->where('patients.age', '<','1')
->where('patients.gender', '=','LELAKI');

 $statistic_newborn_male_pkrc =  $admission ->where('admissions.date', '<', $request -> datereporting)
 ->where('discharges.date_dc', '>', $request -> datereporting)
 ->orWhere(function($admission )use ($request)  
 { 
     $admission
     ->where('patients.gender', '=','LELAKI')
     ->where('admissions.date', '<', $request -> datereporting)
      ->where('discharges.reg_number')
      ->where('patients.age', '<','1');
 });
$kelmarin_newborn_male_pkrc = $statistic_newborn_male_pkrc->count();

 //NB female
$admission= DB::table('admissions')
->join('patients','admissions.kp_passport','patients.kp_passport')
->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
->where('patients.age', '<','1')
->where('patients.gender', '=','PEREMPUAN');

 $statistic_newborn_female_pkrc =  $admission ->where('admissions.date', '<', $request -> datereporting)
 ->where('discharges.date_dc', '>', $request -> datereporting)
 ->orWhere(function($admission )use ($request)  
 { 
     $admission
     ->where('patients.gender', '=','PEREMPUAN')
     ->where('admissions.date', '<', $request -> datereporting)
      ->where('discharges.reg_number')
      ->where('patients.age', '<','1');
 });
$kelmarin_newborn_female_pkrc = $statistic_newborn_female_pkrc->count();


/////////////////////////////////////INPATIENT///////////////////////////////////////////////

//total_male
         $datatable= DB::table('bed__disciplines')

         ->join('ward_admissions','bed__disciplines.rn','ward_admissions.reg_number')
         ->join('patients','ward_admissions.kp_passport','patients.kp_passport')         
         ->join('beds', 'beds.id', 'bed__disciplines.bed_id')
         ->join('wards','wards.id','beds.ward_id')
         ->join('disciplines','disciplines.id','bed__disciplines.discipline_id')
         ->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')   
         ->where('patients.gender', '=','Lelaki');  

      
         $stat_kelmarin_total_male =  $datatable 
         ->where([['bed__disciplines.remarks', '=','New'],
         ['bed__disciplines.date_bed', '<', $request -> datereporting]])
         ->where('beds.ward_id', '=', $request -> ward_id)
         ->where('ward_discharges.date_dc', '>=', $request -> datereporting)
    
      

         ->orWhere(function($datatable )use ($request) 
         
         { 
               $datatable
               ->where('patients.gender', '=','Lelaki')         
               ->where([['bed__disciplines.remarks', '=','New'],
               ['bed__disciplines.date_bed', '<', $request -> datereporting]])            
               ->where('beds.ward_id', '=', $request -> ward_id)
               ->where('ward_discharges.reg_number');
         });

         $count_kelmarin_total_male = $stat_kelmarin_total_male -> count()
         ;
         $data_transfer= DB::table('bed__disciplines')
         ->join('ward_admissions','bed__disciplines.rn','ward_admissions.reg_number')
         
         ->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number') 
         ->join('patients','ward_admissions.kp_passport','patients.kp_passport')         
         ->join('beds', 'beds.id', 'bed__disciplines.bed_id')
         ->join('wards','wards.id','beds.ward_id')
         ->join('disciplines','disciplines.id','bed__disciplines.discipline_id')
         ->where('patients.gender', '=','Lelaki');
         
         $stat_transfer_ward_total_male =  $data_transfer->where([['bed__disciplines.remarks', '=','TRANSFER OUT'],
         ['bed__disciplines.date_bed', '<=', $request -> datereporting]])
         ->where('ward_discharges.date_dc', '>', $request -> datereporting)
         ->where('beds.ward_id', '=', $request -> ward_id)
      
         ->orWhere(function($data_transfer)use ($request) 
               
         { 
               $data_transfer
               ->where([['bed__disciplines.remarks', '=','TRANSFER OUT'],
               ['bed__disciplines.date_bed', '<=', $request -> datereporting]])
               ->where('beds.ward_id', '=', $request -> ward_id)
               ->where('ward_discharges.reg_number');
         });

         
         $data_transfer= DB::table('bed__disciplines')

         ->join('ward_admissions','bed__disciplines.rn','ward_admissions.reg_number')
         
         ->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number') 
         ->join('patients','ward_admissions.kp_passport','patients.kp_passport')         
         ->join('beds', 'beds.id', 'bed__disciplines.bed_id')
         ->join('wards','wards.id','beds.ward_id')
         ->join('disciplines','disciplines.id','bed__disciplines.discipline_id')
         ->where('patients.gender', '=','Lelaki');
         $stat_transfer_discipline_total_male =  $data_transfer->where([['bed__disciplines.remarks', '=','NEW DISCIPLINE'],
         ['bed__disciplines.date_bed', '=<', $request -> datereporting]])
         ->where('ward_discharges.date_dc', '>', $request -> datereporting)
         ->where('beds.ward_id', '=', $request -> ward_id)
         ->where('patients.gender', '=','Lelaki');

      $count_transfer_ward_total_male=  $stat_transfer_ward_total_male ->count();
      $count_transfer_discipline_total_male=  $stat_transfer_discipline_total_male ->count();
      
     $ward = $request ->ward_id;

      if ($ward == 1){
            $kelmarin_total_male = $count_kelmarin_total_male - $count_transfer_ward_total_male - $count_transfer_discipline_total_male + $kelmarin_adult_male_pkrc ;
        
      }
    elseif($ward == 7){
      $kelmarin_total_male = $count_kelmarin_total_male - $count_transfer_ward_total_male - $count_transfer_discipline_total_male + $kelmarin_paeds_male_pkrc + $kelmarin_newborn_male_pkrc ;
  
}

else {
      $kelmarin_total_male = $count_kelmarin_total_male - $count_transfer_ward_total_male - $count_transfer_discipline_total_male ;
}

///////total_female//////////
$datatable= DB::table('bed__disciplines')

->join('ward_admissions','bed__disciplines.rn','ward_admissions.reg_number')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')         
->join('beds', 'beds.id', 'bed__disciplines.bed_id')
->join('wards','wards.id','beds.ward_id')
->join('disciplines','disciplines.id','bed__disciplines.discipline_id')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')   
->where('patients.gender', '=','Perempuan');  


$stat_kelmarin_total_female =  $datatable 
->where([['bed__disciplines.remarks', '=','New'],
['bed__disciplines.date_bed', '<', $request -> datereporting]])
->where('beds.ward_id', '=', $request -> ward_id)
->where('ward_discharges.date_dc', '>=', $request -> datereporting)


->where('patients.gender', '=','Perempuan')
->orWhere(function($datatable )use ($request) 

{ 
      $datatable
      ->where('patients.gender', '=','Perempuan')         
      ->where([['bed__disciplines.remarks', '=','New'],
      ['bed__disciplines.date_bed', '<', $request -> datereporting]])            
      ->where('beds.ward_id', '=', $request -> ward_id)
      ->where('ward_discharges.reg_number');
});

$count_kelmarin_total_female = $stat_kelmarin_total_female -> count()
;
$data_transfer= DB::table('bed__disciplines')
->join('ward_admissions','bed__disciplines.rn','ward_admissions.reg_number')

->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number') 
->join('patients','ward_admissions.kp_passport','patients.kp_passport')         
->join('beds', 'beds.id', 'bed__disciplines.bed_id')
->join('wards','wards.id','beds.ward_id')
->join('disciplines','disciplines.id','bed__disciplines.discipline_id')
->where('patients.gender', '=','Perempuan');

$stat_transfer_ward_total_female =  $data_transfer->where([['bed__disciplines.remarks', '=','TRANSFER OUT'],
['bed__disciplines.date_bed', '<=', $request -> datereporting]])
->where('ward_discharges.date_dc', '>', $request -> datereporting)
->where('patients.gender', '=','Perempuan')
->where('beds.ward_id', '=', $request -> ward_id)

->orWhere(function($data_transfer)use ($request) 
      
{ 
      $data_transfer
      ->where([['bed__disciplines.remarks', '=','TRANSFER OUT'],
      ['bed__disciplines.date_bed', '<=', $request -> datereporting]])
      ->where('beds.ward_id', '=', $request -> ward_id)
         ->where('patients.gender', '=','Perempuan')
      ->where('ward_discharges.reg_number');
});


$data_transfer= DB::table('bed__disciplines')

->join('ward_admissions','bed__disciplines.rn','ward_admissions.reg_number')

->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number') 
->join('patients','ward_admissions.kp_passport','patients.kp_passport')         
->join('beds', 'beds.id', 'bed__disciplines.bed_id')
->join('wards','wards.id','beds.ward_id')
->join('disciplines','disciplines.id','bed__disciplines.discipline_id')
->where('patients.gender', '=','Perempuan');
$stat_transfer_discipline_total_female =  $data_transfer->where([['bed__disciplines.remarks', '=','NEW DISCIPLINE'],
['bed__disciplines.date_bed', '=<', $request -> datereporting]])
->where('ward_discharges.date_dc', '>', $request -> datereporting)
->where('beds.ward_id', '=', $request -> ward_id)
->where('patients.gender', '=','Perempuan');

$count_transfer_ward_total_female=  $stat_transfer_ward_total_female ->count();
$count_transfer_discipline_total_female=  $stat_transfer_discipline_total_female ->count();

$ward = $request ->ward_id;

if ($ward == 6){
   $kelmarin_total_female = $count_kelmarin_total_female - $count_transfer_ward_total_female - $count_transfer_discipline_total_female + $kelmarin_adult_female_pkrc ;

}
elseif($ward == 7){
$kelmarin_total_female = $count_kelmarin_total_female - $count_transfer_ward_total_female - $count_transfer_discipline_total_female + $kelmarin_paeds_female_pkrc + $kelmarin_newborn_female_pkrc ;

}

else {
$kelmarin_total_female = $count_kelmarin_total_female - $count_transfer_ward_total_female - $count_transfer_discipline_total_female ;
}




//total kelmarin

$kelmarin_total_total = $kelmarin_total_female + $kelmarin_total_male;




////////////////////////discipline_male///////////////////////////////////
$datatable= DB::table('bed__disciplines')

->join('ward_admissions','bed__disciplines.rn','ward_admissions.reg_number')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')         
->join('beds', 'beds.id', 'bed__disciplines.bed_id')
->join('wards','wards.id','beds.ward_id')
->join('disciplines','disciplines.id','bed__disciplines.discipline_id')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')

->where('patients.gender', '=','Lelaki');  

$stat_kelmarin_discipline_male =  $datatable 
 
->where([['bed__disciplines.remarks', '=','New'],
['bed__disciplines.date_bed', '<', $request -> datereporting]])
->where('beds.ward_id', '=', $request -> ward_id)
->where('ward_discharges.date_dc', '>=', $request -> datereporting)
 ->where('bed__disciplines.discipline_id', '=', $request -> discipline_id)

->orWhere(function($datatable )use ($request) 

{ 
      $datatable
      ->where('patients.gender', '=','Lelaki')    
   
      ->where([['bed__disciplines.remarks', '=','New'],
      ['bed__disciplines.date_bed', '<', $request -> datereporting]])
   
      ->where('beds.ward_id', '=', $request -> ward_id)
      ->where('bed__disciplines.discipline_id', '=', $request -> discipline_id)
      ->where('ward_discharges.reg_number');
})
->orWhere(function($datatable)use ($request) 
         
{ 
   $datatable
   ->where([['bed__disciplines.remarks', '=','NEW DISCIPLINE'],
   ['bed__disciplines.date_bed', '<', $request -> datereporting]]) 
   ->where('beds.ward_id', '=', $request -> ward_id)
   ->where('ward_discharges.date_dc', '>=', $request -> datereporting)   
   ->where('bed__disciplines.discipline_id', '=', $request -> discipline_id);
});

$count_kelmarin_discipline_male = $stat_kelmarin_discipline_male -> count();




        $data_transfer= DB::table('bed__disciplines')
        ->join('ward_admissions','bed__disciplines.rn','ward_admissions.reg_number')
        ->join('patients','ward_admissions.kp_passport','patients.kp_passport')         
        ->join('beds', 'beds.id', 'bed__disciplines.bed_id')
        ->join('wards','wards.id','beds.ward_id')
        ->join('disciplines','disciplines.id','bed__disciplines.discipline_id')

        ->where('patients.gender', '=','Lelaki');
        
        $stat_transfer_ward_total_male =  $data_transfer->where([['bed__disciplines.remarks', '=','TRANSFER OUT'],
        ['bed__disciplines.date_bed', '=', $request -> datereporting]])
        ->where('patients.gender', '=','Lelaki')
        ->where('beds.ward_id', '=', $request -> ward_id)
        ->where('bed__disciplines.discipline_id', '=', $request -> discipline_id);
        
        $count_transfer_ward_discipline_male=  $stat_transfer_ward_total_male ->count();

        $datatable= DB::table('bed__disciplines')

        ->join('ward_admissions','bed__disciplines.rn','ward_admissions.reg_number')
        ->join('patients','ward_admissions.kp_passport','patients.kp_passport')         
        ->join('beds', 'beds.id', 'bed__disciplines.bed_id')
        ->join('wards','wards.id','beds.ward_id')
        ->join('disciplines','disciplines.id','bed__disciplines.discipline_id')
        ->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')
        
        ->where('patients.gender', '=','Lelaki');  
        
        $transferred_kelmarin_discipline_male =  $datatable 
     
        ->where([['bed__disciplines.remarks', '=','TRANSFER OUT'],
        ['bed__disciplines.date_bed', '<', $request -> datereporting]])
        ->where('beds.ward_id', '=', $request -> ward_id)
        ->where('ward_discharges.date_dc', '>', $request -> datereporting)
         ->where('bed__disciplines.discipline_id', '=', $request -> discipline_id)
         
         ->orWhere(function($datatable )use ($request) 
         {
         $datatable 
      
         ->where([['bed__disciplines.remarks', '=','TRANSFER OUT'],
         ['bed__disciplines.date_bed', '<', $request -> datereporting]])
         ->where('beds.ward_id', '=', $request -> ward_id)
          ->where('bed__disciplines.discipline_id', '=', $request -> discipline_id)           
    
          ->where('ward_discharges.reg_number');
        });
        $count_kelmarin_discipline_male_transferred = $transferred_kelmarin_discipline_male -> count();
        
      $discipline = $request -> discipline_id;
      if($discipline == 1 && $ward == 1 )  {
        $kelmarin_discipline_male = $count_kelmarin_discipline_male - $count_transfer_ward_discipline_male + $kelmarin_adult_male_pkrc - $count_kelmarin_discipline_male_transferred;
      }
      else{
            $kelmarin_discipline_male = $count_kelmarin_discipline_male - $count_transfer_ward_discipline_male - $count_kelmarin_discipline_male_transferred;
        
      }

//////////////////////////discipline_female////////////////////////////////////
$datatable= DB::table('bed__disciplines')
->join('ward_admissions','bed__disciplines.rn','ward_admissions.reg_number')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')         
->join('beds', 'beds.id', 'bed__disciplines.bed_id')
->join('wards','wards.id','beds.ward_id')
->join('disciplines','disciplines.id','bed__disciplines.discipline_id')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')
->where('patients.gender', '=','Perempuan');  

$stat_kelmarin_discipline_female =  $datatable 
 
->where('patients.gender', '=','Perempuan')
->where([['bed__disciplines.remarks', '=','New'],
['bed__disciplines.date_bed', '<', $request -> datereporting]])
->where('beds.ward_id', '=', $request -> ward_id)
->where('ward_discharges.date_dc', '>=', $request -> datereporting)
 ->where('bed__disciplines.discipline_id', '=', $request -> discipline_id)

->orWhere(function($datatable )use ($request) 

{ 
      $datatable
      ->where('patients.gender', '=','Perempuan')      
      ->where([['bed__disciplines.remarks', '=','New'],
      ['bed__disciplines.date_bed', '<', $request -> datereporting]])   
      ->where('beds.ward_id', '=', $request -> ward_id)
      ->where('bed__disciplines.discipline_id', '=', $request -> discipline_id)
      ->where('ward_discharges.reg_number');
})
->orWhere(function($datatable)use ($request) 
         
{ 
   $datatable
   ->where([['bed__disciplines.remarks', '=','NEW DISCIPLINE'],
   ['bed__disciplines.date_bed', '<', $request -> datereporting]]) 
   ->where('beds.ward_id', '=', $request -> ward_id)
   ->where('patients.gender', '=','Perempuan')
   ->where('ward_discharges.date_dc', '>=', $request -> datereporting)   
   ->where('bed__disciplines.discipline_id', '=', $request -> discipline_id)
   ;
});

$count_kelmarin_discipline_female = $stat_kelmarin_discipline_female -> count();



        $data_transfer= DB::table('bed__disciplines')
        ->join('ward_admissions','bed__disciplines.rn','ward_admissions.reg_number')
        ->join('patients','ward_admissions.kp_passport','patients.kp_passport')         
        ->join('beds', 'beds.id', 'bed__disciplines.bed_id')
        ->join('wards','wards.id','beds.ward_id')
        ->join('disciplines','disciplines.id','bed__disciplines.discipline_id')
        ->where('patients.gender', '=','Perempuan');
        
        $stat_transfer_ward_total_female =  $data_transfer->where([['bed__disciplines.remarks', '=','TRANSFER OUT'],
        ['bed__disciplines.date_bed', '=', $request -> datereporting]])
        ->where('patients.gender', '=','Perempuan')
        ->where('beds.ward_id', '=', $request -> ward_id)
        ->where('bed__disciplines.discipline_id', '=', $request -> discipline_id);
        
        $count_transfer_ward_discipline_female=  $stat_transfer_ward_total_female ->count();

        $datatable= DB::table('bed__disciplines')

        ->join('ward_admissions','bed__disciplines.rn','ward_admissions.reg_number')
        ->join('patients','ward_admissions.kp_passport','patients.kp_passport')         
        ->join('beds', 'beds.id', 'bed__disciplines.bed_id')
        ->join('wards','wards.id','beds.ward_id')
        ->join('disciplines','disciplines.id','bed__disciplines.discipline_id')
        ->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')
        
        ->where('patients.gender', '=','Perempuan');  
        
        $transferred_kelmarin_discipline_female =  $datatable 
    
        ->where([['bed__disciplines.remarks', '=','TRANSFER OUT'],
        ['bed__disciplines.date_bed', '<', $request -> datereporting]])
        ->where('beds.ward_id', '=', $request -> ward_id)
        ->where('ward_discharges.date_dc', '>', $request -> datereporting)
         ->where('bed__disciplines.discipline_id', '=', $request -> discipline_id)
         
         ->orWhere(function($datatable )use ($request) 
         {
         $datatable 
     
         ->where([['bed__disciplines.remarks', '=','TRANSFER OUT'],
         ['bed__disciplines.date_bed', '<', $request -> datereporting]])
         ->where('beds.ward_id', '=', $request -> ward_id)
          ->where('bed__disciplines.discipline_id', '=', $request -> discipline_id)           
          ->where('patients.gender', '=','Perempuan')
          ->where('ward_discharges.reg_number');
        });
        $count_kelmarin_discipline_female_transferred = $transferred_kelmarin_discipline_female -> count();
        
      $discipline = $request -> discipline_id;
      if($discipline == 1 && $ward == 6 )  {
        $kelmarin_discipline_female = $count_kelmarin_discipline_female - $count_transfer_ward_discipline_female + $kelmarin_adult_female_pkrc - $count_kelmarin_discipline_female_transferred;
      }
      else{
            $kelmarin_discipline_female = $count_kelmarin_discipline_female - $count_transfer_ward_discipline_female - $count_kelmarin_discipline_female_transferred;
        
      }




///////////////////// ADMISSION STAT///////////////////////////////

//PKRC ADMISSION
//adult male
$admission= DB::table('admissions')
->join('patients','admissions.kp_passport','patients.kp_passport')
->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
->where('patients.age', '>','12')
->where('patients.gender', '=','LELAKI');

 $statisticadmission_adult_male_pkrc =  $admission ->where('admissions.date', '=', $request -> datereporting);

$admission_adult_male_pkrc = $statisticadmission_adult_male_pkrc->count();

 //adult female
$admission= DB::table('admissions')
->join('patients','admissions.kp_passport','patients.kp_passport')
->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
->where('patients.age', '>','12')
->where('patients.gender', '=','PEREMPUAN');

 $statisticadmission_adult_female_pkrc = $admission ->where('admissions.date', '=', $request -> datereporting);
$admission_adult_female_pkrc = $statisticadmission_adult_female_pkrc->count();

//PAEDS male
$admission= DB::table('admissions')
->join('patients','admissions.kp_passport','patients.kp_passport')
->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
->where('patients.age', '<','12')
->where('patients.age', '>=','1')
->where('patients.gender', '=','LELAKI');

 $statisticadmission_paeds_male_pkrc = $admission ->where('admissions.date', '=', $request -> datereporting);
$admission_paeds_male_pkrc = $statisticadmission_paeds_male_pkrc->count();



 //PAEDS female
$admission= DB::table('admissions')
->join('patients','admissions.kp_passport','patients.kp_passport')
->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
->where('patients.age', '<','12')
->where('patients.age', '>=','1')
->where('patients.gender', '=','PEREMPUAN');

 $statisticadmission_paeds_female_pkrc =$admission ->where('admissions.date', '=', $request -> datereporting);

$admission_paeds_female_pkrc = $statisticadmission_paeds_female_pkrc->count();



//NB male
$admission= DB::table('admissions')
->join('patients','admissions.kp_passport','patients.kp_passport')
->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
->where('patients.age', '<','1')
->where('patients.gender', '=','LELAKI');

 $statisticadmission_newborn_male_pkrc = $admission ->where('admissions.date', '=', $request -> datereporting);
$admission_newborn_male_pkrc = $statisticadmission_newborn_male_pkrc->count();

 //NB female
$admission= DB::table('admissions')
->join('patients','admissions.kp_passport','patients.kp_passport')
->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
->where('patients.age', '<','1')
->where('patients.gender', '=','PEREMPUAN');

 $statisticadmission_newborn_female_pkrc = $admission ->where('admissions.date', '=', $request -> datereporting);
$admission_newborn_female_pkrc = $statisticadmission_newborn_female_pkrc->count();

//INPATIENT ADMISSION
//male
$data_transfer= DB::table('bed__disciplines')

->join('ward_admissions','bed__disciplines.rn','ward_admissions.reg_number')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')         
->join('beds', 'beds.id', 'bed__disciplines.bed_id')
->join('wards','wards.id','beds.ward_id')
->join('disciplines','disciplines.id','bed__disciplines.discipline_id')
->where('patients.age', '>','12')
->where('patients.gender', '=','Lelaki');

$stat_admission_total_male =  $data_transfer->where([['bed__disciplines.remarks', '=','New'],
['bed__disciplines.date_bed', '=', $request -> datereporting]])
->where('beds.ward_id', '=', $request -> ward_id);

$count_admission_adult_total_male=  $stat_admission_total_male ->count();

if ($ward == 1){
      $admission_adult_total_male = $count_admission_adult_total_male + $admission_adult_male_pkrc ;  
}

else {   $admission_adult_total_male = $count_admission_adult_total_male ;
}

//female
$tblAdmFemale= DB::table('bed__disciplines')

->join('ward_admissions','bed__disciplines.rn','ward_admissions.reg_number')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')         
->join('beds', 'beds.id', 'bed__disciplines.bed_id')
->join('wards','wards.id','beds.ward_id')
->join('disciplines','disciplines.id','bed__disciplines.discipline_id')
->where('patients.age', '>','12')
->where('patients.gender', '=','Perempuan');

$stat_admission_total_female =  $tblAdmFemale->where([['bed__disciplines.remarks', '=','New'],
['bed__disciplines.date_bed', '=', $request -> datereporting]])
->where('beds.ward_id', '=', $request -> ward_id);

$count_admission_adult_total_female=  $stat_admission_total_female ->count();
if ($ward == 7){
      $admission_adult_total_female = $count_admission_adult_total_female + $admission_adult_female_pkrc ;  
}

else {   $admission_adult_total_female = $count_admission_adult_total_female ;
}


$admission_adult_total_total =$admission_adult_total_female+$admission_adult_total_male;

//discipline male
$data_transfer= DB::table('bed__disciplines')

->join('ward_admissions','bed__disciplines.rn','ward_admissions.reg_number')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')         
->join('beds', 'beds.id', 'bed__disciplines.bed_id')
->join('wards','wards.id','beds.ward_id')
->join('disciplines','disciplines.id','bed__disciplines.discipline_id')
->where('patients.age', '>','12')
->where('patients.gender', '=','Lelaki');

$stat_admission_discipline_male =  $data_transfer->where([['bed__disciplines.remarks', '=','New'],
['bed__disciplines.date_bed', '=', $request -> datereporting]])
->where('bed__disciplines.discipline_id', '=', $request -> discipline_id)
->where('beds.ward_id', '=', $request -> ward_id);

$count_admission_adult_discipline_male=  $stat_admission_discipline_male ->count();
$ward = $request ->ward_id;

$discipline = $request -> discipline_id;
if($discipline == 1  && $ward == 1)  {
  $admission_adult_discipline_male = $count_admission_adult_discipline_male + $admission_adult_male_pkrc;
}
else{
      $admission_adult_discipline_male = $count_admission_adult_discipline_male;
  
}

//discipline female
$tblAdmFemale= DB::table('bed__disciplines')

->join('ward_admissions','bed__disciplines.rn','ward_admissions.reg_number')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')         
->join('beds', 'beds.id', 'bed__disciplines.bed_id')
->join('wards','wards.id','beds.ward_id')
->join('disciplines','disciplines.id','bed__disciplines.discipline_id')
->where('patients.age', '>','12')
->where('patients.gender', '=','Perempuan');

$stat_admission_discipline_female =  $tblAdmFemale->where([['bed__disciplines.remarks', '=','New'],
['bed__disciplines.date_bed', '=', $request -> datereporting]])
->where('bed__disciplines.discipline_id', '=', $request -> discipline_id)
->where('beds.ward_id', '=', $request -> ward_id);

$count_admission_adult_discipline_female=  $stat_admission_discipline_female ->count();
$ward = $request ->ward_id;

$discipline = $request -> discipline_id;
if($discipline == 1  && $ward == 6)  {
  $admission_adult_discipline_female = $count_admission_adult_discipline_female + $admission_adult_female_pkrc;
}
else{
      $admission_adult_discipline_female = $count_admission_adult_discipline_female;
  
}


//paed stat
// paeds  male
$data_transfer= DB::table('bed__disciplines')

->join('ward_admissions','bed__disciplines.rn','ward_admissions.reg_number')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')         
->join('beds', 'beds.id', 'bed__disciplines.bed_id')
->join('wards','wards.id','beds.ward_id')
->join('disciplines','disciplines.id','bed__disciplines.discipline_id')
->where('patients.age', '<','12')
->where('patients.age', '>=','1')

->where('patients.gender', '=','Lelaki');

$stat_admission_total_male =  $data_transfer->where([['bed__disciplines.remarks', '=','New'],
['bed__disciplines.date_bed', '=', $request -> datereporting]])
->where('beds.ward_id', '=', $request -> ward_id);

$count_admission_paeds_total_male=  $stat_admission_total_male ->count();
if ($ward == 7){
      $admission_paeds_total_male = $count_admission_paeds_total_male + $admission_paeds_male_pkrc ;  
}

else {   $admission_paeds_total_male = $count_admission_paeds_total_male ;
}

// paeds  female
$tblAdmFemale= DB::table('bed__disciplines')

->join('ward_admissions','bed__disciplines.rn','ward_admissions.reg_number')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')         
->join('beds', 'beds.id', 'bed__disciplines.bed_id')
->join('wards','wards.id','beds.ward_id')
->join('disciplines','disciplines.id','bed__disciplines.discipline_id')
->where('patients.age', '>','12') ->where('patients.age', '<','12')
->where('patients.age', '>=','1')
->where('patients.gender', '=','Perempuan');

$stat_admission_total_female =  $tblAdmFemale->where([['bed__disciplines.remarks', '=','New'],
['bed__disciplines.date_bed', '=', $request -> datereporting]])
->where('beds.ward_id', '=', $request -> ward_id);

$count_admission_paeds_total_female=  $stat_admission_total_female ->count();
if ($ward == 7){
      $admission_paeds_total_female = $count_admission_paeds_total_female + $admission_paeds_female_pkrc ;  
}

else {   $admission_paeds_total_female = $count_admission_paeds_total_female ;
}

$admission_paeds_total_total =$admission_paeds_total_female+$admission_paeds_total_male;

//discipline paeds male
$data_transfer= DB::table('bed__disciplines')

->join('ward_admissions','bed__disciplines.rn','ward_admissions.reg_number')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')         
->join('beds', 'beds.id', 'bed__disciplines.bed_id')
->join('wards','wards.id','beds.ward_id')
->join('disciplines','disciplines.id','bed__disciplines.discipline_id')
->where('patients.age', '<','12')
->where('patients.age', '>=','1')
->where('patients.gender', '=','Lelaki');

$stat_admission_discipline_male =  $data_transfer->where([['bed__disciplines.remarks', '=','New'],
['bed__disciplines.date_bed', '=', $request -> datereporting]])
->where('bed__disciplines.discipline_id', '=', $request -> discipline_id)
->where('beds.ward_id', '=', $request -> ward_id);

$count_admission_paeds_discipline_male=  $stat_admission_discipline_male ->count();

$discipline = $request -> discipline_id;
if($discipline == 1 )  {
  $admission_paeds_discipline_male = $count_admission_paeds_discipline_male + $admission_paeds_male_pkrc;
}
else{
      $admission_paeds_discipline_male = $count_admission_paeds_discipline_male;
  
}
//discipline paeds female
$tblAdmFemale= DB::table('bed__disciplines')

->join('ward_admissions','bed__disciplines.rn','ward_admissions.reg_number')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')         
->join('beds', 'beds.id', 'bed__disciplines.bed_id')
->join('wards','wards.id','beds.ward_id')
->join('disciplines','disciplines.id','bed__disciplines.discipline_id')
->where('patients.age', '<','12')
->where('patients.age', '>=','1')
->where('patients.gender', '=','Perempuan');

$stat_admission_discipline_female =  $tblAdmFemale->where([['bed__disciplines.remarks', '=','New'],
['bed__disciplines.date_bed', '=', $request -> datereporting]])
->where('bed__disciplines.discipline_id', '=', $request -> discipline_id)
->where('beds.ward_id', '=', $request -> ward_id);

$count_admission_paeds_discipline_female=  $stat_admission_discipline_female ->count();

$discipline = $request -> discipline_id;
if($discipline == 1 )  {
  $admission_paeds_discipline_female = $count_admission_paeds_discipline_female + $admission_paeds_female_pkrc;
}
else{
      $admission_paeds_discipline_female = $count_admission_paeds_discipline_female;
  
}




//newborn stat

//paed stat
// newborn  male
$data_transfer= DB::table('bed__disciplines')

->join('ward_admissions','bed__disciplines.rn','ward_admissions.reg_number')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')         
->join('beds', 'beds.id', 'bed__disciplines.bed_id')
->join('wards','wards.id','beds.ward_id')
->join('disciplines','disciplines.id','bed__disciplines.discipline_id')
->where('patients.age', '<','1')

->where('patients.gender', '=','Lelaki');

$stat_admission_total_male =  $data_transfer->where([['bed__disciplines.remarks', '=','New'],
['bed__disciplines.date_bed', '=', $request -> datereporting]])
->where('beds.ward_id', '=', $request -> ward_id);


$count_admission_newborn_total_male=  $stat_admission_total_male ->count();
if ($ward == 7){
      $admission_newborn_total_male = $count_admission_newborn_total_male + $admission_newborn_male_pkrc ;  
}

else {   $admission_newborn_total_male = $count_admission_newborn_total_male ;
}



// newborn  female
$tblAdmFemale= DB::table('bed__disciplines')

->join('ward_admissions','bed__disciplines.rn','ward_admissions.reg_number')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')         
->join('beds', 'beds.id', 'bed__disciplines.bed_id')
->join('wards','wards.id','beds.ward_id')
->join('disciplines','disciplines.id','bed__disciplines.discipline_id')
->where('patients.age', '<','1')
->where('patients.gender', '=','Perempuan');

$stat_admission_total_female =  $tblAdmFemale->where([['bed__disciplines.remarks', '=','New'],
['bed__disciplines.date_bed', '=', $request -> datereporting]])
->where('beds.ward_id', '=', $request -> ward_id);


$count_admission_newborn_total_female=  $stat_admission_total_female ->count();
if ($ward == 7){
      $admission_newborn_total_female = $count_admission_newborn_total_female + $admission_newborn_female_pkrc ;  
}

else {   $admission_newborn_total_female = $count_admission_newborn_total_female ;
}



$admission_newborn_total_total =$admission_newborn_total_female+$admission_newborn_total_male;

//discipline newborn male
$data_transfer= DB::table('bed__disciplines')

->join('ward_admissions','bed__disciplines.rn','ward_admissions.reg_number')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')         
->join('beds', 'beds.id', 'bed__disciplines.bed_id')
->join('wards','wards.id','beds.ward_id')
->join('disciplines','disciplines.id','bed__disciplines.discipline_id')
->where('patients.age', '<','1')
->where('patients.gender', '=','Lelaki');

$stat_admission_discipline_male =  $data_transfer->where([['bed__disciplines.remarks', '=','New'],
['bed__disciplines.date_bed', '=', $request -> datereporting]])
->where('bed__disciplines.discipline_id', '=', $request -> discipline_id)
->where('beds.ward_id', '=', $request -> ward_id);

$count_admission_newborn_discipline_male=  $stat_admission_discipline_male ->count();

$discipline = $request -> discipline_id;
if($discipline == 1 )  {
  $admission_newborn_discipline_male = $count_admission_newborn_discipline_male + $admission_newborn_male_pkrc;
}
else{
      $admission_newborn_discipline_male = $count_admission_newborn_discipline_male;
  
}




//discipline newborn female
$tblAdmFemale= DB::table('bed__disciplines')

->join('ward_admissions','bed__disciplines.rn','ward_admissions.reg_number')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')         
->join('beds', 'beds.id', 'bed__disciplines.bed_id')
->join('wards','wards.id','beds.ward_id')
->join('disciplines','disciplines.id','bed__disciplines.discipline_id')
->where('patients.age', '<','1')
->where('patients.gender', '=','Perempuan');

$stat_admission_discipline_female =  $tblAdmFemale->where([['bed__disciplines.remarks', '=','New'],
['bed__disciplines.date_bed', '=', $request -> datereporting]])
->where('bed__disciplines.discipline_id', '=', $request -> discipline_id)
->where('beds.ward_id', '=', $request -> ward_id);

$count_admission_newborn_discipline_female=  $stat_admission_discipline_female ->count();

$discipline = $request -> discipline_id;
if($discipline == 1 )  {
  $admission_newborn_discipline_female = $count_admission_newborn_discipline_female + $admission_newborn_female_pkrc;
}
else{
      $admission_newborn_discipline_female = $count_admission_newborn_discipline_female;
  
}




// TRANSFER WARD

//paed stat
// TRANSFER IN male
$data_transfer= DB::table('bed__disciplines')

->join('ward_admissions','bed__disciplines.rn','ward_admissions.reg_number')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')         
->join('beds', 'beds.id', 'bed__disciplines.bed_id')
->join('wards','wards.id','beds.ward_id')
->join('disciplines','disciplines.id','bed__disciplines.discipline_id')

->where('patients.gender', '=','Lelaki');

$stat_admission_total_male =  $data_transfer->where([['bed__disciplines.remarks', '=','TRANSFER IN'],
['bed__disciplines.date_bed', '=', $request -> datereporting]])
->where('beds.ward_id', '=', $request -> ward_id);

$transfer_ward_total_male=  $stat_admission_total_male ->count();
// TRANSFER IN  female
$tblAdmFemale= DB::table('bed__disciplines')

->join('ward_admissions','bed__disciplines.rn','ward_admissions.reg_number')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')         
->join('beds', 'beds.id', 'bed__disciplines.bed_id')
->join('wards','wards.id','beds.ward_id')
->join('disciplines','disciplines.id','bed__disciplines.discipline_id')
->where('patients.gender', '=','Perempuan');

$stat_admission_total_female =  $tblAdmFemale->where([['bed__disciplines.remarks', '=','TRANSFER IN'],
['bed__disciplines.date_bed', '=', $request -> datereporting]])
->where('beds.ward_id', '=', $request -> ward_id);

$transfer_ward_total_female=  $stat_admission_total_female ->count();
$transfer_ward_total_total =$transfer_ward_total_female+$transfer_ward_total_male;

//discipline TRANSFER IN male
$data_transfer= DB::table('bed__disciplines')

->join('ward_admissions','bed__disciplines.rn','ward_admissions.reg_number')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')         
->join('beds', 'beds.id', 'bed__disciplines.bed_id')
->join('wards','wards.id','beds.ward_id')
->join('disciplines','disciplines.id','bed__disciplines.discipline_id')
->where('patients.gender', '=','Lelaki');

$stat_admission_discipline_male =  $data_transfer->where([['bed__disciplines.remarks', '=','TRANSFER IN'],
['bed__disciplines.date_bed', '=', $request -> datereporting]])
->where('bed__disciplines.discipline_id', '=', $request -> discipline_id)
->where('beds.ward_id', '=', $request -> ward_id);

$transfer_ward_discipline_male=  $stat_admission_discipline_male ->count();
//discipline TRANSFER IN female
$tblAdmFemale= DB::table('bed__disciplines')

->join('ward_admissions','bed__disciplines.rn','ward_admissions.reg_number')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')         
->join('beds', 'beds.id', 'bed__disciplines.bed_id')
->join('wards','wards.id','beds.ward_id')
->join('disciplines','disciplines.id','bed__disciplines.discipline_id')
->where('patients.gender', '=','Perempuan');

$stat_admission_discipline_female =  $tblAdmFemale->where([['bed__disciplines.remarks', '=','TRANSFER IN'],
['bed__disciplines.date_bed', '=', $request -> datereporting]])
->where('bed__disciplines.discipline_id', '=', $request -> discipline_id)
->where('beds.ward_id', '=', $request -> ward_id);

$transfer_ward_discipline_female=  $stat_admission_discipline_female ->count();


// TRANSFER DISCIPLINE
// NEW DISCIPLINE male
$data_transfer= DB::table('bed__disciplines')

->join('ward_admissions','bed__disciplines.rn','ward_admissions.reg_number')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')         
->join('beds', 'beds.id', 'bed__disciplines.bed_id')
->join('wards','wards.id','beds.ward_id')
->join('disciplines','disciplines.id','bed__disciplines.discipline_id')

->where('patients.gender', '=','Lelaki');

$stat_admission_total_male =  $data_transfer->where([['bed__disciplines.remarks', '=','NEW DISCIPLINE'],
['bed__disciplines.date_bed', '=', $request -> datereporting]])
->where('beds.ward_id', '=', $request -> ward_id);

$transfer_discipline_total_male=  $stat_admission_total_male ->count();
// NEW DISCIPLINE  female
$tblAdmFemale= DB::table('bed__disciplines')

->join('ward_admissions','bed__disciplines.rn','ward_admissions.reg_number')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')         
->join('beds', 'beds.id', 'bed__disciplines.bed_id')
->join('wards','wards.id','beds.ward_id')
->join('disciplines','disciplines.id','bed__disciplines.discipline_id')
->where('patients.gender', '=','Perempuan');

$stat_admission_total_female =  $tblAdmFemale->where([['bed__disciplines.remarks', '=','NEW DISCIPLINE'],
['bed__disciplines.date_bed', '=', $request -> datereporting]])
->where('beds.ward_id', '=', $request -> ward_id);

$transfer_discipline_total_female=  $stat_admission_total_female ->count();
$transfer_discipline_total_total =$transfer_discipline_total_female+$transfer_discipline_total_male;

//discipline NEW DISCIPLINE male
$data_transfer= DB::table('bed__disciplines')

->join('ward_admissions','bed__disciplines.rn','ward_admissions.reg_number')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')         
->join('beds', 'beds.id', 'bed__disciplines.bed_id')
->join('wards','wards.id','beds.ward_id')
->join('disciplines','disciplines.id','bed__disciplines.discipline_id')
->where('patients.gender', '=','Lelaki');

$stat_admission_discipline_male =  $data_transfer->where([['bed__disciplines.remarks', '=','NEW DISCIPLINE'],
['bed__disciplines.date_bed', '=', $request -> datereporting]])
->where('bed__disciplines.discipline_id', '=', $request -> discipline_id)
->where('beds.ward_id', '=', $request -> ward_id);

$transfer_discipline_discipline_male=  $stat_admission_discipline_male ->count();
//discipline NEW DISCIPLINE female
$tblAdmFemale= DB::table('bed__disciplines')

->join('ward_admissions','bed__disciplines.rn','ward_admissions.reg_number')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')         
->join('beds', 'beds.id', 'bed__disciplines.bed_id')
->join('wards','wards.id','beds.ward_id')
->join('disciplines','disciplines.id','bed__disciplines.discipline_id')
->where('patients.gender', '=','Perempuan');

$stat_admission_discipline_female =  $tblAdmFemale->where([['bed__disciplines.remarks', '=','NEW DISCIPLINE'],
['bed__disciplines.date_bed', '=', $request -> datereporting]])
->where('bed__disciplines.discipline_id', '=', $request -> discipline_id)
->where('beds.ward_id', '=', $request -> ward_id);

$transfer_discipline_discipline_female=  $stat_admission_discipline_female ->count();


$total_total_male =  $kelmarin_total_male + $admission_adult_total_male + $admission_paeds_total_male + $admission_newborn_total_male 
+ $transfer_ward_total_male + $transfer_discipline_total_male;
$total_total_female =  $kelmarin_total_female + $admission_adult_total_female + $admission_paeds_total_female + $admission_newborn_total_female 
+ $transfer_ward_total_female + $transfer_discipline_total_female;
$total_total_total =  $kelmarin_total_total + $admission_adult_total_total + $admission_paeds_total_total + $admission_newborn_total_total 
+ $transfer_ward_total_total + $transfer_discipline_total_total;

$total_discipline_male =  $kelmarin_discipline_male + $admission_adult_discipline_male + $admission_paeds_discipline_male + $admission_newborn_discipline_male 
+ $transfer_ward_discipline_male + $transfer_discipline_discipline_male;
$total_discipline_female =  $kelmarin_discipline_female + $admission_adult_discipline_female + $admission_paeds_discipline_female + $admission_newborn_discipline_female 
+ $transfer_ward_discipline_female + $transfer_discipline_discipline_female;



      return response()->json( compact( 'kelmarin_total_male','kelmarin_total_female','kelmarin_total_total', 'kelmarin_discipline_male',
      'kelmarin_discipline_female','transfer_ward_total_male', 'admission_adult_total_male','admission_adult_total_female' ,'admission_adult_total_total',
      'admission_adult_discipline_female' ,'admission_adult_discipline_male',  'admission_paeds_total_male','admission_paeds_total_female' ,'admission_paeds_total_total',
      'admission_paeds_discipline_female' ,'admission_paeds_discipline_male',  'admission_newborn_total_male','admission_newborn_total_female' ,'admission_newborn_total_total',
      'admission_newborn_discipline_female' ,'admission_newborn_discipline_male',  'transfer_ward_total_male','transfer_ward_total_female' ,'transfer_ward_total_total',
      'transfer_ward_discipline_female' ,'transfer_ward_discipline_male', 'transfer_discipline_total_male','transfer_discipline_total_female' ,'transfer_discipline_total_total',
      'transfer_discipline_discipline_female' ,'transfer_discipline_discipline_male', 'total_total_male','total_total_female','total_total_total', 'total_discipline_male',
      'total_discipline_female',











     ));
   }

   public function active(Request $request)
   {
    //PKRC


     $active_table= DB::table('bed__disciplines')

     ->join('ward_admissions','bed__disciplines.rn','ward_admissions.reg_number')
     ->join('patients','ward_admissions.kp_passport','patients.kp_passport')         
     ->join('beds', 'beds.id', 'bed__disciplines.bed_id')
     ->join('wards','wards.id','beds.ward_id')
     ->join('disciplines','disciplines.id','bed__disciplines.discipline_id')
     ->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')
     ->where([['bed__disciplines.remarks', '=','New'],
     ['bed__disciplines.date_bed', '<', $request -> datereporting]]) 
     ->where('beds.ward_id', '=', $request -> ward_id)

     ->orWhere(function($active_table)use ($request) 
         
     { 
        $active_table
        ->where([['bed__disciplines.remarks', '=','NEW DISCIPLINE'],
        ['bed__disciplines.date_bed', '<=', $request -> datereporting]]) 
        ->where('beds.ward_id', '=', $request -> ward_id);
     })
     ->select('disciplines.discipline', 'disciplines.id')
     ->groupBy('discipline')
     ->get();

     return response()->json( $active_table);
   }


   public function discharge(Request $request)
   {
//total balik ke rumah
     $discharge= DB::table('ward_discharges')

     ->join('bed__disciplines','bed__disciplines.rn','ward_discharges.reg_number')
     ->join('ward_admissions','ward_admissions.kp_passport','ward_discharges.kp_passport')    
     ->join('patients','ward_admissions.kp_passport','patients.kp_passport')         
     ->join('beds', 'beds.id', 'bed__disciplines.bed_id')
     ->join('wards','wards.id','beds.ward_id')
     ->join('disciplines','disciplines.id','bed__disciplines.discipline_id');

     $count_balik_total_male = $discharge ->where([['ward_discharges.date_dc', '=', $request -> datereporting],['ward_discharges.type_dc', '=','Balik ke Rumah']])
     ->where('beds.ward_id', '=', $request -> ward_id)  ->where('patients.gender','=','Lelaki') ->count();
     $count_balik_total_female = $discharge ->where([['ward_discharges.date_dc', '=', $request -> datereporting],['ward_discharges.type_dc', '=','Balik ke Rumah']])
     ->where('beds.ward_id', '=', $request -> ward_id)  ->where('patients.gender','=','Perempuan') ->count();
     $count_balik_total_discipline_male = $discharge ->where([['ward_discharges.date_dc', '=', $request -> datereporting],['ward_discharges.type_dc', '=','Balik ke Rumah']])
     ->where('beds.ward_id', '=', $request -> ward_id) ->where('bed__disciplines.discipline_id', '=', $request -> discipline_id) 
     ->where('patients.gender','=','Lelaki') ->count();
     $count_balik_total_discipline_female = $discharge ->where([['ward_discharges.date_dc', '=', $request -> datereporting],['ward_discharges.type_dc', '=','Balik ke Rumah']])
     ->where('beds.ward_id', '=', $request -> ward_id) ->where('bed__disciplines.discipline_id', '=', $request -> discipline_id) 
     ->where('patients.gender','=','Perempuan') ->count();

      $count_dama_total_male = $discharge ->where([['ward_discharges.date_dc', '=', $request -> datereporting],['ward_discharges.type_dc', '=','Keluar Hospital dengan Risiko Sendiri']])
      ->where('beds.ward_id', '=', $request -> ward_id) ->where('patients.gender','=','Lelaki') ->count();
      $count_dama_total_female = $discharge ->where([['ward_discharges.date_dc', '=', $request -> datereporting],['ward_discharges.type_dc', '=','Keluar Hospital dengan Risiko Sendiri']])
      ->where('beds.ward_id', '=', $request -> ward_id)  ->where('patients.gender','=','Perempuan')->count();
      $count_dama_total_discipline_male = $discharge ->where([['ward_discharges.date_dc', '=', $request -> datereporting],['ward_discharges.type_dc', '=','Keluar Hospital dengan Risiko Sendiri']])
      ->where('beds.ward_id', '=', $request -> ward_id) ->where('bed__disciplines.discipline_id', '=', $request -> discipline_id) 
      ->where('patients.gender','=','Lelaki')->count();
      $count_dama_total_discipline_female = $discharge ->where([['ward_discharges.date_dc', '=', $request -> datereporting],['ward_discharges.type_dc', '=','Keluar Hospital dengan Risiko Sendiri']])
      ->where('beds.ward_id', '=', $request -> ward_id) ->where('bed__disciplines.discipline_id', '=', $request -> discipline_id) 
      ->where('patients.gender','=','Perempuan')->count();
 
 
      $count_tanpa_total_male = $discharge ->where([['ward_discharges.date_dc', '=', $request -> datereporting],['ward_discharges.type_dc', '=','Keluar Hospital Tanpa Kebenaran']])
      ->where('beds.ward_id', '=', $request -> ward_id) ->where('patients.gender','=','Lelaki') ->count();
      $count_tanpa_total_female = $discharge ->where([['ward_discharges.date_dc', '=', $request -> datereporting],['ward_discharges.type_dc', '=','Keluar Hospital Tanpa Kebenaran']])
      ->where('beds.ward_id', '=', $request -> ward_id)  ->where('patients.gender','=','Perempuan')->count();
      $count_tanpa_total_discipline_male = $discharge ->where([['ward_discharges.date_dc', '=', $request -> datereporting],['ward_discharges.type_dc', '=','Keluar Hospital Tanpa Kebenaran']])
      ->where('beds.ward_id', '=', $request -> ward_id) ->where('bed__disciplines.discipline_id', '=', $request -> discipline_id) 
      ->where('patients.gender','=','Lelaki')->count();
      $count_tanpa_total_discipline_female = $discharge ->where([['ward_discharges.date_dc', '=', $request -> datereporting],['ward_discharges.type_dc', '=','Keluar Hospital Tanpa Kebenaran']])
      ->where('beds.ward_id', '=', $request -> ward_id) ->where('bed__disciplines.discipline_id', '=', $request -> discipline_id) 
      ->where('patients.gender','=','Perempuan')->count();

      $count_pindah_total_male = $discharge ->where([['ward_discharges.date_dc', '=', $request -> datereporting],['ward_discharges.type_dc', '=','Ditukar ke Hospital Lain']])
      ->where('beds.ward_id', '=', $request -> ward_id) ->where('patients.gender','=','Lelaki') ->count();
      $count_pindah_total_female = $discharge ->where([['ward_discharges.date_dc', '=', $request -> datereporting],['ward_discharges.type_dc', '=','Ditukar ke Hospital Lain']])
      ->where('beds.ward_id', '=', $request -> ward_id)  ->where('patients.gender','=','Perempuan')->count();
      $count_pindah_total_discipline_male = $discharge ->where([['ward_discharges.date_dc', '=', $request -> datereporting],['ward_discharges.type_dc', '=','Ditukar ke Hospital Lain']])
      ->where('beds.ward_id', '=', $request -> ward_id) ->where('bed__disciplines.discipline_id', '=', $request -> discipline_id) 
      ->where('patients.gender','=','Lelaki')->count();
      $count_pindah_total_discipline_female = $discharge ->where([['ward_discharges.date_dc', '=', $request -> datereporting],['ward_discharges.type_dc', '=','Ditukar ke Hospital Lain']])
      ->where('beds.ward_id', '=', $request -> ward_id) ->where('bed__disciplines.discipline_id', '=', $request -> discipline_id) 
      ->where('patients.gender','=','Perempuan')->count();

      $count_mati_total_male = $discharge ->where([['ward_discharges.date_dc', '=', $request -> datereporting],['ward_discharges.type_dc', '=','Mati']])
      ->where('beds.ward_id', '=', $request -> ward_id) ->where('patients.gender','=','Lelaki') ->count();
      $count_mati_total_female = $discharge ->where([['ward_discharges.date_dc', '=', $request -> datereporting],['ward_discharges.type_dc', '=','Mati']])
      ->where('beds.ward_id', '=', $request -> ward_id)  ->where('patients.gender','=','Perempuan')->count();
      $count_mati_total_discipline_male = $discharge ->where([['ward_discharges.date_dc', '=', $request -> datereporting],['ward_discharges.type_dc', '=','Mati']])
      ->where('beds.ward_id', '=', $request -> ward_id) ->where('bed__disciplines.discipline_id', '=', $request -> discipline_id) 
      ->where('patients.gender','=','Lelaki')->count();
      $count_mati_total_discipline_female = $discharge ->where([['ward_discharges.date_dc', '=', $request -> datereporting],['ward_discharges.type_dc', '=','Mati']])
      ->where('beds.ward_id', '=', $request -> ward_id) ->where('bed__disciplines.discipline_id', '=', $request -> discipline_id) 
      ->where('patients.gender','=','Perempuan')->count();

      $count_cuti_total_male = $discharge ->where([['ward_discharges.date_dc', '=', $request -> datereporting],['ward_discharges.type_dc', '=','Kebenaran Bercuti']])
      ->where('beds.ward_id', '=', $request -> ward_id) ->where('patients.gender','=','Lelaki') ->count();
      $count_cuti_total_female = $discharge ->where([['ward_discharges.date_dc', '=', $request -> datereporting],['ward_discharges.type_dc', '=','Kebenaran Bercuti']])
      ->where('beds.ward_id', '=', $request -> ward_id)  ->where('patients.gender','=','Perempuan')->count();
      $count_cuti_total_discipline_male = $discharge ->where([['ward_discharges.date_dc', '=', $request -> datereporting],['ward_discharges.type_dc', '=','Kebenaran Bercuti']])
      ->where('beds.ward_id', '=', $request -> ward_id) ->where('bed__disciplines.discipline_id', '=', $request -> discipline_id) 
      ->where('patients.gender','=','Lelaki')->count();
      $count_cuti_total_discipline_female = $discharge ->where([['ward_discharges.date_dc', '=', $request -> datereporting],['ward_discharges.type_dc', '=','Kebenaran Bercuti']])
      ->where('beds.ward_id', '=', $request -> ward_id) ->where('bed__disciplines.discipline_id', '=', $request -> discipline_id) 
      ->where('patients.gender','=','Perempuan')->count();





     $discharges_pkrc= DB::table('discharges')
      ->join('admissions','admissions.reg_number','=','discharges.reg_number')
      ->join('patients', 'patients.kp_passport','discharges.kp_passport');

      $balik_adult_male_pkrc = $discharges_pkrc ->where([['discharges.date_dc', '=', $request -> datereporting],['discharges.type_dc', '=','Balik ke Rumah']])
                                           ->where([['patients.gender','=','Lelaki'],['patients.age','>=', 12 ]]) ->count() ;

      $balik_adult_female_pkrc = $discharges_pkrc ->where([['discharges.date_dc', '=', $request -> datereporting],['discharges.type_dc', '=','Balik ke Rumah']])
                                           ->where([['patients.gender','=','Perempuan'],['patients.age','>=', 12 ]]) ->count() ;

      $balik_paeds_male_pkrc = $discharges_pkrc ->where([['discharges.date_dc', '=', $request -> datereporting],['discharges.type_dc', '=','Balik ke Rumah']])
                                           ->where([['patients.gender','=','Lelaki'],['patients.age','<', 12 ], ['patients.age','>=', 1 ]])  ->count() ;

      $balik_paeds_female_pkrc = $discharges_pkrc ->where([['discharges.date_dc', '=', $request -> datereporting],['discharges.type_dc', '=','Balik ke Rumah']])
                                           ->where([['patients.gender','=','Perempuan'],['patients.age','<', 12 ], ['patients.age','>=', 1 ]])  ->count() ;
      
      $balik_newborn_male_pkrc = $discharges_pkrc ->where([['discharges.date_dc', '=', $request -> datereporting],['discharges.type_dc', '=','Balik ke Rumah']])
                                           ->where([['patients.gender','=','Lelaki'], ['patients.age','<', 1 ]])  ->count() ;

      $balik_newborn_female_pkrc = $discharges_pkrc ->where([['discharges.date_dc', '=', $request -> datereporting],['discharges.type_dc', '=','Balik ke Rumah']])
                                           ->where([['patients.gender','=','Perempuan'], ['patients.age','<', 1 ]]) ->count()  ;             
                                           

      $dama_adult_male_pkrc = $discharges_pkrc ->where([['discharges.date_dc', '=', $request -> datereporting],['discharges.type_dc', '=','Keluar Hospital dengan Risiko Sendiri']])
                                           ->where([['patients.gender','=','Lelaki'],['patients.age','>=', 12 ]])  ->count() ;

      $dama_adult_female_pkrc = $discharges_pkrc ->where([['discharges.date_dc', '=', $request -> datereporting],['discharges.type_dc', '=','Keluar Hospital dengan Risiko Sendiri']])
                                           ->where([['patients.gender','=','Perempuan'],['patients.age','>=', 12 ]])  ->count() ;

      $dama_paeds_male_pkrc = $discharges_pkrc ->where([['discharges.date_dc', '=', $request -> datereporting],['discharges.type_dc', '=','Keluar Hospital dengan Risiko Sendiri']])
                                           ->where([['patients.gender','=','Lelaki'],['patients.age','<', 12 ], ['patients.age','>=', 1 ]])  ->count() ;

      $dama_paeds_female_pkrc = $discharges_pkrc ->where([['discharges.date_dc', '=', $request -> datereporting],['discharges.type_dc', '=','Keluar Hospital dengan Risiko Sendiri']])
                                           ->where([['patients.gender','=','Perempuan'],['patients.age','<', 12 ], ['patients.age','>=', 1 ]])  ->count() ;
      
      $dama_newborn_male_pkrc = $discharges_pkrc ->where([['discharges.date_dc', '=', $request -> datereporting],['discharges.type_dc', '=','Keluar Hospital dengan Risiko Sendiri']])
                                           ->where([['patients.gender','=','Lelaki'], ['patients.age','<', 1 ]])  ->count() ;

      $dama_newborn_female_pkrc = $discharges_pkrc ->where([['discharges.date_dc', '=', $request -> datereporting],['discharges.type_dc', '=','Keluar Hospital dengan Risiko Sendiri']])
                                           ->where([['patients.gender','=','Perempuan'], ['patients.age','<', 1 ]])  ->count() ;   

      
                                           $tanpa_adult_male_pkrc = $discharges_pkrc ->where([['discharges.date_dc', '=', $request -> datereporting],['discharges.type_dc', '=','Keluar Hospital Tanpa Kebenaran']])
                                           ->where([['patients.gender','=','Lelaki'],['patients.age','>=', 12 ]])  ->count() ;

      $tanpa_adult_female_pkrc = $discharges_pkrc ->where([['discharges.date_dc', '=', $request -> datereporting],['discharges.type_dc', '=','Keluar Hospital Tanpa Kebenaran']])
                                           ->where([['patients.gender','=','Perempuan'],['patients.age','>=', 12 ]])  ->count() ;

      $tanpa_paeds_male_pkrc = $discharges_pkrc ->where([['discharges.date_dc', '=', $request -> datereporting],['discharges.type_dc', '=','Keluar Hospital Tanpa Kebenaran']])
                                           ->where([['patients.gender','=','Lelaki'],['patients.age','<', 12 ], ['patients.age','>=', 1 ]])  ->count() ;

      $tanpa_paeds_female_pkrc = $discharges_pkrc ->where([['discharges.date_dc', '=', $request -> datereporting],['discharges.type_dc', '=','Keluar Hospital Tanpa Kebenaran']])
                                           ->where([['patients.gender','=','Perempuan'],['patients.age','<', 12 ], ['patients.age','>=', 1 ]])  ->count() ;
      
      $tanpa_newborn_male_pkrc = $discharges_pkrc ->where([['discharges.date_dc', '=', $request -> datereporting],['discharges.type_dc', '=','Keluar Hospital Tanpa Kebenaran']])
                                           ->where([['patients.gender','=','Lelaki'], ['patients.age','<', 1 ]])  ->count() ;

      $tanpa_newborn_female_pkrc = $discharges_pkrc ->where([['discharges.date_dc', '=', $request -> datereporting],['discharges.type_dc', '=','Keluar Hospital Tanpa Kebenaran']])
                                           ->where([['patients.gender','=','Perempuan'], ['patients.age','<', 1 ]])  ->count() ;   

      
                                           $pindah_adult_male_pkrc = $discharges_pkrc ->where([['discharges.date_dc', '=', $request -> datereporting],['discharges.type_dc', '=','Ditukar ke Hospital Lain']])
                                           ->where([['patients.gender','=','Lelaki'],['patients.age','>=', 12 ]])  ->count() ;

      $pindah_adult_female_pkrc = $discharges_pkrc ->where([['discharges.date_dc', '=', $request -> datereporting],['discharges.type_dc', '=','Ditukar ke Hospital Lain']])
                                           ->where([['patients.gender','=','Perempuan'],['patients.age','>=', 12 ]])  ->count() ;

      $pindah_paeds_male_pkrc = $discharges_pkrc ->where([['discharges.date_dc', '=', $request -> datereporting],['discharges.type_dc', '=','Ditukar ke Hospital Lain']])
                                           ->where([['patients.gender','=','Lelaki'],['patients.age','<', 12 ], ['patients.age','>=', 1 ]])  ->count() ;

      $pindah_paeds_female_pkrc = $discharges_pkrc ->where([['discharges.date_dc', '=', $request -> datereporting],['discharges.type_dc', '=','Ditukar ke Hospital Lain']])
                                           ->where([['patients.gender','=','Perempuan'],['patients.age','<', 12 ], ['patients.age','>=', 1 ]])  ->count() ;
      
      $pindah_newborn_male_pkrc = $discharges_pkrc ->where([['discharges.date_dc', '=', $request -> datereporting],['discharges.type_dc', '=','Ditukar ke Hospital Lain']])
                                           ->where([['patients.gender','=','Lelaki'], ['patients.age','<', 1 ]])  ->count() ;

      $pindah_newborn_female_pkrc = $discharges_pkrc ->where([['discharges.date_dc', '=', $request -> datereporting],['discharges.type_dc', '=','Ditukar ke Hospital Lain']])
                                           ->where([['patients.gender','=','Perempuan'], ['patients.age','<', 1 ]])  ->count() ;   


      
                                           $mati_adult_male_pkrc = $discharges_pkrc ->where([['discharges.date_dc', '=', $request -> datereporting],['discharges.type_dc', '=','Mati']])
                                           ->where([['patients.gender','=','Lelaki'],['patients.age','>=', 12 ]])  ->count() ;

      $mati_adult_female_pkrc = $discharges_pkrc ->where([['discharges.date_dc', '=', $request -> datereporting],['discharges.type_dc', '=','Mati']])
                                           ->where([['patients.gender','=','Perempuan'],['patients.age','>=', 12 ]]) ->count()  ;

      $mati_paeds_male_pkrc = $discharges_pkrc ->where([['discharges.date_dc', '=', $request -> datereporting],['discharges.type_dc', '=','Mati']])
                                           ->where([['patients.gender','=','Lelaki'],['patients.age','<', 12 ], ['patients.age','>=', 1 ]]) ->count()  ;

      $mati_paeds_female_pkrc = $discharges_pkrc ->where([['discharges.date_dc', '=', $request -> datereporting],['discharges.type_dc', '=','Mati']])
                                           ->where([['patients.gender','=','Perempuan'],['patients.age','<', 12 ], ['patients.age','>=', 1 ]]) ->count()  ;
      
      $mati_newborn_male_pkrc = $discharges_pkrc ->where([['discharges.date_dc', '=', $request -> datereporting],['discharges.type_dc', '=','Mati']])
                                           ->where([['patients.gender','=','Lelaki'], ['patients.age','<', 1 ]])  ->count() ;

      $mati_newborn_female_pkrc = $discharges_pkrc ->where([['discharges.date_dc', '=', $request -> datereporting],['discharges.type_dc', '=','Mati']])
                                           ->where([['patients.gender','=','Perempuan'], ['patients.age','<', 1 ]])  ->count() ;   


      
                                           $cuti_adult_male_pkrc = $discharges_pkrc ->where([['discharges.date_dc', '=', $request -> datereporting],['discharges.type_dc', '=','Kebenaran Bercuti']])
                                           ->where([['patients.gender','=','Lelaki'],['patients.age','>=', 12 ]]) ->count()  ;

      $cuti_adult_female_pkrc = $discharges_pkrc ->where([['discharges.date_dc', '=', $request -> datereporting],['discharges.type_dc', '=','Kebenaran Bercuti']])
                                           ->where([['patients.gender','=','Perempuan'],['patients.age','>=', 12 ]])  ->count() ;

      $cuti_paeds_male_pkrc = $discharges_pkrc ->where([['discharges.date_dc', '=', $request -> datereporting],['discharges.type_dc', '=','Kebenaran Bercuti']])
                                           ->where([['patients.gender','=','Lelaki'],['patients.age','<', 12 ], ['patients.age','>=', 1 ]])  ->count() ;

      $cuti_paeds_female_pkrc = $discharges_pkrc ->where([['discharges.date_dc', '=', $request -> datereporting],['discharges.type_dc', '=','Kebenaran Bercuti']])
                                           ->where([['patients.gender','=','Perempuan'],['patients.age','<', 12 ], ['patients.age','>=', 1 ]])  ->count() ;
      
      $cuti_newborn_male_pkrc = $discharges_pkrc ->where([['discharges.date_dc', '=', $request -> datereporting],['discharges.type_dc', '=','Kebenaran Bercuti']])
                                           ->where([['patients.gender','=','Lelaki'], ['patients.age','<', 1 ]])  ->count() ;

      $cuti_newborn_female_pkrc = $discharges_pkrc ->where([['discharges.date_dc', '=', $request -> datereporting],['discharges.type_dc', '=','Kebenaran Bercuti']])
                                           ->where([['patients.gender','=','Perempuan'], ['patients.age','<', 1 ]])  ->count() ;   

      $ward = $request ->ward_id;

     $discipline = $request -> discipline_id;
     
     //jumlah lelaki balik
     if($ward == 1)  {
      $balik_total_male = $count_balik_total_male + $balik_adult_male_pkrc ;
     }
     elseif($ward == 7){ 
      $balik_total_male = $count_balik_total_male + $balik_paeds_male_pkrc + $balik_newborn_male_pkrc ;
     }
     else{
      $balik_total_male = $count_balik_total_male ;    
     }
          //jumlah perempuan balik
          if($ward == 6)  {
            $balik_total_female = $count_balik_total_female + $balik_adult_female_pkrc ;
           }
           elseif($ward == 7){ 
            $balik_total_female = $count_balik_total_female + $balik_paeds_female_pkrc + $balik_newborn_female_pkrc ;
           }
           else{
            $balik_total_female = $count_balik_total_female ;    
           }
      
      $balik_total_total = $balik_total_male + $balik_total_female;

           //balik lelaki disiplin
           if($ward == 1 && $discipline == 1)  {
            $balik_discipline_male = $count_balik_total_discipline_male + $balik_adult_male_pkrc ;
           }
           elseif($ward == 7){ 
            $balik_discipline_male = $count_balik_total_discipline_male + $balik_paeds_male_pkrc + $balik_newborn_male_pkrc ;
           }
           else{
            $balik_discipline_male = $count_balik_total_discipline_male ;    
           }

                  //balik perempuan disiplin
                  if($ward == 6 && $discipline == 1)  {
                        $balik_discipline_female = $count_balik_total_discipline_female + $balik_adult_female_pkrc ;
                       }
                       elseif($ward == 7){ 
                        $balik_discipline_female = $count_balik_total_discipline_female + $balik_paeds_female_pkrc + $balik_newborn_female_pkrc ;
                       }
                       else{
                        $balik_discipline_female = $count_balik_total_discipline_female ;    
                       }
      
     
     //jumlah lelaki dama
     if($ward == 1)  {
      $dama_total_male = $count_dama_total_male + $dama_adult_male_pkrc ;
     }
     elseif($ward == 7){ 
      $dama_total_male = $count_dama_total_male + $dama_paeds_male_pkrc + $dama_newborn_male_pkrc ;
     }
     else{
      $dama_total_male = $count_dama_total_male ;    
     }
          //jumlah perempuan dama
          if($ward == 6)  {
            $dama_total_female = $count_dama_total_female + $dama_adult_female_pkrc ;
           }
           elseif($ward == 7){ 
            $dama_total_female = $count_dama_total_female + $dama_paeds_female_pkrc + $dama_newborn_female_pkrc ;
           }
           else{
            $dama_total_female = $count_dama_total_female ;    
           }
      
      $dama_total_total = $dama_total_male + $dama_total_female;

           //dama lelaki disiplin
           if($ward == 1 && $discipline == 1)  {
            $dama_discipline_male = $count_dama_total_discipline_male + $dama_adult_male_pkrc ;
           }
           elseif($ward == 7){ 
            $dama_discipline_male = $count_dama_total_discipline_male + $dama_paeds_male_pkrc + $dama_newborn_male_pkrc ;
           }
           else{
            $dama_discipline_male = $count_dama_total_discipline_male ;    
           }

                  //dama perempuan disiplin
                  if($ward == 6 && $discipline == 1)  {
                        $dama_discipline_female = $count_dama_total_discipline_female + $dama_adult_female_pkrc ;
                       }
                       elseif($ward == 7){ 
                        $dama_discipline_female = $count_dama_total_discipline_female + $dama_paeds_female_pkrc + $dama_newborn_female_pkrc ;
                       }
                       else{
                        $dama_discipline_female = $count_dama_total_discipline_female ;    
                       }

           
     //jumlah lelaki tanpa
     if($ward == 1)  {
      $tanpa_total_male = $count_tanpa_total_male + $tanpa_adult_male_pkrc ;
     }
     elseif($ward == 7){ 
      $tanpa_total_male = $count_tanpa_total_male + $tanpa_paeds_male_pkrc + $tanpa_newborn_male_pkrc ;
     }
     else{
      $tanpa_total_male = $count_tanpa_total_male ;    
     }
          //jumlah perempuan tanpa
          if($ward == 6)  {
            $tanpa_total_female = $count_tanpa_total_female + $tanpa_adult_female_pkrc ;
           }
           elseif($ward == 7){ 
            $tanpa_total_female = $count_tanpa_total_female + $tanpa_paeds_female_pkrc + $tanpa_newborn_female_pkrc ;
           }
           else{
            $tanpa_total_female = $count_tanpa_total_female ;    
           }
      
      $tanpa_total_total = $tanpa_total_male + $tanpa_total_female;

           //tanpa lelaki disiplin
           if($ward == 1 && $discipline == 1)  {
            $tanpa_discipline_male = $count_tanpa_total_discipline_male + $tanpa_adult_male_pkrc ;
           }
           elseif($ward == 7){ 
            $tanpa_discipline_male = $count_tanpa_total_discipline_male + $tanpa_paeds_male_pkrc + $tanpa_newborn_male_pkrc ;
           }
           else{
            $tanpa_discipline_male = $count_tanpa_total_discipline_male ;    
           }

                  //tanpa perempuan disiplin
                  if($ward == 6 && $discipline == 1)  {
                        $tanpa_discipline_female = $count_tanpa_total_discipline_female + $tanpa_adult_female_pkrc ;
                       }
                       elseif($ward == 7){ 
                        $tanpa_discipline_female = $count_tanpa_total_discipline_female + $tanpa_paeds_female_pkrc + $tanpa_newborn_female_pkrc ;
                       }
                       else{
                        $tanpa_discipline_female = $count_tanpa_total_discipline_female ;    
                       }

     
     //jumlah lelaki pindah
     if($ward == 1)  {
      $pindah_total_male = $count_pindah_total_male + $pindah_adult_male_pkrc ;
     }
     elseif($ward == 7){ 
      $pindah_total_male = $count_pindah_total_male + $pindah_paeds_male_pkrc + $pindah_newborn_male_pkrc ;
     }
     else{
      $pindah_total_male = $count_pindah_total_male ;    
     }
          //jumlah perempuan pindah
          if($ward == 6)  {
            $pindah_total_female = $count_pindah_total_female + $pindah_adult_female_pkrc ;
           }
           elseif($ward == 7){ 
            $pindah_total_female = $count_pindah_total_female + $pindah_paeds_female_pkrc + $pindah_newborn_female_pkrc ;
           }
           else{
            $pindah_total_female = $count_pindah_total_female ;    
           }
      
      $pindah_total_total = $pindah_total_male + $pindah_total_female;

           //pindah lelaki disiplin
           if($ward == 1 && $discipline == 1)  {
            $pindah_discipline_male = $count_pindah_total_discipline_male + $pindah_adult_male_pkrc ;
           }
           elseif($ward == 7){ 
            $pindah_discipline_male = $count_pindah_total_discipline_male + $pindah_paeds_male_pkrc + $pindah_newborn_male_pkrc ;
           }
           else{
            $pindah_discipline_male = $count_pindah_total_discipline_male ;    
           }

                  //pindah perempuan disiplin
                  if($ward == 6 && $discipline == 1)  {
                        $pindah_discipline_female = $count_pindah_total_discipline_female + $pindah_adult_female_pkrc ;
                       }
                       elseif($ward == 7){ 
                        $pindah_discipline_female = $count_pindah_total_discipline_female + $pindah_paeds_female_pkrc + $pindah_newborn_female_pkrc ;
                       }
                       else{
                        $pindah_discipline_female = $count_pindah_total_discipline_female ;    
                       }

     
     //jumlah lelaki mati
     if($ward == 1)  {
      $mati_total_male = $count_mati_total_male + $mati_adult_male_pkrc ;
     }
     elseif($ward == 7){ 
      $mati_total_male = $count_mati_total_male + $mati_paeds_male_pkrc + $mati_newborn_male_pkrc ;
     }
     else{
      $mati_total_male = $count_mati_total_male ;    
     }
          //jumlah perempuan mati
          if($ward == 6)  {
            $mati_total_female = $count_mati_total_female + $mati_adult_female_pkrc ;
           }
           elseif($ward == 7){ 
            $mati_total_female = $count_mati_total_female + $mati_paeds_female_pkrc + $mati_newborn_female_pkrc ;
           }
           else{
            $mati_total_female = $count_mati_total_female ;    
           }
      
      $mati_total_total = $mati_total_male + $mati_total_female;

           //mati lelaki disiplin
           if($ward == 1 && $discipline == 1)  {
            $mati_discipline_male = $count_mati_total_discipline_male + $mati_adult_male_pkrc ;
           }
           elseif($ward == 7){ 
            $mati_discipline_male = $count_mati_total_discipline_male + $mati_paeds_male_pkrc + $mati_newborn_male_pkrc ;
           }
           else{
            $mati_discipline_male = $count_mati_total_discipline_male ;    
           }

                  //mati perempuan disiplin
                  if($ward == 6 && $discipline == 1)  {
                        $mati_discipline_female = $count_mati_total_discipline_female + $mati_adult_female_pkrc ;
                       }
                       elseif($ward == 7){ 
                        $mati_discipline_female = $count_mati_total_discipline_female + $mati_paeds_female_pkrc + $mati_newborn_female_pkrc ;
                       }
                       else{
                        $mati_discipline_female = $count_mati_total_discipline_female ;    
                       }

     
     //jumlah lelaki cuti
     if($ward == 1)  {
      $cuti_total_male = $count_cuti_total_male + $cuti_adult_male_pkrc ;
     }
     elseif($ward == 7){ 
      $cuti_total_male = $count_cuti_total_male + $cuti_paeds_male_pkrc + $cuti_newborn_male_pkrc ;
     }
     else{
      $cuti_total_male = $count_cuti_total_male ;    
     }
          //jumlah perempuan cuti
          if($ward == 6)  {
            $cuti_total_female = $count_cuti_total_female + $cuti_adult_female_pkrc ;
           }
           elseif($ward == 7){ 
            $cuti_total_female = $count_cuti_total_female + $cuti_paeds_female_pkrc + $cuti_newborn_female_pkrc ;
           }
           else{
            $cuti_total_female = $count_cuti_total_female ;    
           }
      
      $cuti_total_total = $cuti_total_male + $cuti_total_female;

           //cuti lelaki disiplin
           if($ward == 1 && $discipline == 1)  {
            $cuti_discipline_male = $count_cuti_total_discipline_male + $cuti_adult_male_pkrc ;
           }
           elseif($ward == 7){ 
            $cuti_discipline_male = $count_cuti_total_discipline_male + $cuti_paeds_male_pkrc + $cuti_newborn_male_pkrc ;
           }
           else{
            $cuti_discipline_male = $count_cuti_total_discipline_male ;    
           }

                  //cuti perempuan disiplin
                  if($ward == 6 && $discipline == 1)  {
                        $cuti_discipline_female = $count_cuti_total_discipline_female + $cuti_adult_female_pkrc ;
                       }
                       elseif($ward == 7){ 
                        $cuti_discipline_female = $count_cuti_total_discipline_female + $cuti_paeds_female_pkrc + $cuti_newborn_female_pkrc ;
                       }
                       else{
                        $cuti_discipline_female = $count_cuti_total_discipline_female ;    
                       }

                 
         //pindah ward lain
         $transfer= DB::table('bed__disciplines')
         ->join('beds', 'beds.id', 'bed__disciplines.bed_id')
         ->join('wards','wards.id','beds.ward_id')
         ->join('disciplines','disciplines.id','bed__disciplines.discipline_id')
         ->join('ward_admissions', 'ward_admissions.reg_number','bed__disciplines.rn' )
         ->join('patients','patients.kp_passport', 'ward_admissions.kp_passport' );
    
         $transfer_ward_total_male  = $transfer ->where([['bed__disciplines.date_bed', '=', $request -> datereporting],['bed__disciplines.status', '=','TRANSFER OUT']])
         ->where('beds.ward_id', '=', $request -> ward_id)  ->where('patients.gender','=','Lelaki') ->count();
         $transfer_ward_total_female  = $transfer ->where([['bed__disciplines.date_bed', '=', $request -> datereporting],['bed__disciplines.status', '=','TRANSFER OUT']])
         ->where('beds.ward_id', '=', $request -> ward_id)  ->where('patients.gender','=','Perempuan') ->count();
         $transfer_ward_discipline_male  = $transfer ->where([['bed__disciplines.date_bed', '=', $request -> datereporting],['bed__disciplines.status', '=','TRANSFER OUT']])
         ->where('beds.ward_id', '=', $request -> ward_id) ->where('bed__disciplines.discipline_id', '=', $request -> discipline_id) 
         ->where('patients.gender','=','Lelaki') ->count();
         $transfer_ward_discipline_female  = $transfer ->where([['bed__disciplines.date_bed', '=', $request -> datereporting],['bed__disciplines.status', '=','TRANSFER OUT']])
         ->where('beds.ward_id', '=', $request -> ward_id) ->where('bed__disciplines.discipline_id', '=', $request -> discipline_id) 
         ->where('patients.gender','=','Perempuan') ->count();
         $transfer_ward_total_total=    $transfer_ward_total_male +  $transfer_ward_total_female;

      

           //pindah disipline
           $transfer= DB::table('bed__disciplines')
           ->join('beds', 'beds.id', 'bed__disciplines.bed_id')
           ->join('wards','wards.id','beds.ward_id')
           ->join('disciplines','disciplines.id','bed__disciplines.discipline_id')
           ->join('ward_admissions', 'ward_admissions.reg_number','bed__disciplines.rn' )
           ->join('patients','patients.kp_passport', 'ward_admissions.kp_passport' );
      
           $transfer_discipline_total_male  = $transfer ->where([['bed__disciplines.date_bed', '=', $request -> datereporting],['bed__disciplines.status', '=','UPDATE DISCIPLINE']])
           ->where('beds.ward_id', '=', $request -> ward_id)  ->where('patients.gender','=','Lelaki') ->count();
           $transfer_discipline_total_female  = $transfer ->where([['bed__disciplines.date_bed', '=', $request -> datereporting],['bed__disciplines.status', '=','UPDATE DISCIPLINE']])
           ->where('beds.ward_id', '=', $request -> ward_id)  ->where('patients.gender','=','Perempuan') ->count();
           $transfer_discipline_discipline_male  = $transfer ->where([['bed__disciplines.date_bed', '=', $request -> datereporting],['bed__disciplines.status', '=','UPDATE DISCIPLINE']])
           ->where('beds.ward_id', '=', $request -> ward_id) ->where('bed__disciplines.discipline_id', '=', $request -> discipline_id) 
           ->where('patients.gender','=','Lelaki') ->count();
           $transfer_discipline_discipline_female  = $transfer ->where([['bed__disciplines.date_bed', '=', $request -> datereporting],['bed__disciplines.status', '=','UPDATE DISCIPLINE']])
           ->where('beds.ward_id', '=', $request -> ward_id) ->where('bed__disciplines.discipline_id', '=', $request -> discipline_id) 
           ->where('patients.gender','=','Perempuan') ->count();
           $transfer_discipline_total_total=    $transfer_discipline_total_male +  $transfer_discipline_total_female;
  
  
     return response()->json( compact('balik_total_male', 'balik_total_female', 'balik_total_total','balik_discipline_male', 'balik_discipline_female',
     'dama_total_male', 'dama_total_female', 'dama_total_total','dama_discipline_male', 'dama_discipline_female',  
     'tanpa_total_male', 'tanpa_total_female', 'tanpa_total_total','tanpa_discipline_male', 'tanpa_discipline_female', 
     'pindah_total_male', 'pindah_total_female', 'pindah_total_total','pindah_discipline_male', 'pindah_discipline_female',
     'mati_total_male', 'mati_total_female', 'mati_total_total','mati_discipline_male', 'mati_discipline_female',
     'cuti_total_male', 'cuti_total_female', 'cuti_total_total','cuti_discipline_male', 'cuti_discipline_female',
     'transfer_ward_total_male', 'transfer_ward_total_female', 'transfer_ward_total_total',
     'transfer_ward_discipline_male', 'transfer_ward_discipline_female',     'transfer_discipline_total_male', 'transfer_discipline_total_female', 'transfer_discipline_total_total',
     'transfer_discipline_discipline_male', 'transfer_discipline_discipline_female'



));
   }



   /////////////////admitted discharged same day///////////////////
   public function sameDay(Request $request)
   {
//total balik ke rumah
     $discharge= DB::table('ward_discharges')

     ->join('bed__disciplines','bed__disciplines.rn','ward_discharges.reg_number')
     ->join('ward_admissions','ward_admissions.kp_passport','ward_discharges.kp_passport')    
     ->join('patients','ward_admissions.kp_passport','patients.kp_passport')         
     ->join('beds', 'beds.id', 'bed__disciplines.bed_id')
     ->join('wards','wards.id','beds.ward_id')
     ->join('disciplines','disciplines.id','bed__disciplines.discipline_id');

     $admit_discharge_total_male = $discharge ->where('ward_discharges.date_dc', '=', $request -> datereporting) ->where('ward_admissions.date', '=', $request -> datereporting)
     ->where('beds.ward_id', '=', $request -> ward_id)  ->where('patients.gender','=','Lelaki') ->count();
     $admit_discharge_total_female = $discharge ->where('ward_discharges.date_dc', '=', $request -> datereporting) ->where('ward_admissions.date', '=', $request -> datereporting)
     ->where('beds.ward_id', '=', $request -> ward_id)  ->where('patients.gender','=','Perempuan') ->count();
     $admit_discharge_discipline_male = $discharge ->where('ward_discharges.date_dc', '=', $request -> datereporting) ->where('ward_admissions.date', '=', $request -> datereporting)
     ->where('beds.ward_id', '=', $request -> ward_id) ->where('bed__disciplines.discipline_id', '=', $request -> discipline_id) 
     ->where('patients.gender','=','Lelaki') ->count();
     $admit_discharge_discipline_female = $discharge ->where('ward_discharges.date_dc', '=', $request -> datereporting) ->where('ward_admissions.date', '=', $request -> datereporting)
     ->where('beds.ward_id', '=', $request -> ward_id) ->where('bed__disciplines.discipline_id', '=', $request -> discipline_id) 
     ->where('patients.gender','=','Perempuan') ->count();

     $admit_discharge_total_total= $admit_discharge_total_male + $admit_discharge_total_female;

     return response()->json( compact('admit_discharge_total_male','admit_discharge_total_female','admit_discharge_total_total','admit_discharge_discipline_male', 'admit_discharge_discipline_female'  ));

   }


}
