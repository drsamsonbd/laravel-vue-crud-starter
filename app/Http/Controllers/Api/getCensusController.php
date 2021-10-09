<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class getCensusController extends Controller
{
    public function index(Request $request)
    {
//total_male
         $datatable= DB::table('bed__disciplines')

         ->join('ward_admissions','bed__disciplines.rn','ward_admissions.reg_number')
         ->join('patients','ward_admissions.kp_passport','patients.kp_passport')         
         ->join('beds', 'beds.id', 'bed__disciplines.bed_id')
         ->join('wards','wards.id','beds.ward_id')
         ->join('disciplines','disciplines.id','bed__disciplines.discipline_id')
         ->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')
         ->where('patients.age', '>','12')
         ->where('patients.gender', '=','Lelaki');  

      
         $stat_kelmarin_total_male =  $datatable 
         ->where([['bed__disciplines.remarks', '=','New'],
         ['bed__disciplines.date_bed', '<', $request -> datereporting]])
         ->where('beds.ward_id', '=', $request -> ward_id)
         ->where('ward_discharges.date_dc', '>', $request -> datereporting)
         ->where('beds.ward_id', '=', $request -> ward_id)
      

         ->orWhere(function($datatable )use ($request) 
         
         { 
               $datatable
               ->where('patients.gender', '=','Lelaki')         
               ->where([['bed__disciplines.remarks', '=','New'],
               ['bed__disciplines.date_bed', '<', $request -> datereporting]])
               ->where('patients.age', '>','12')    
               ->where('beds.ward_id', '=', $request -> ward_id)
               ->where('ward_discharges.reg_number');
         });

         $count_kelmarin_total_male = $stat_kelmarin_total_male -> count();

         $data_transfer= DB::table('bed__disciplines')

         ->join('ward_admissions','bed__disciplines.rn','ward_admissions.reg_number')
         ->join('patients','ward_admissions.kp_passport','patients.kp_passport')         
         ->join('beds', 'beds.id', 'bed__disciplines.bed_id')
         ->join('wards','wards.id','beds.ward_id')
         ->join('disciplines','disciplines.id','bed__disciplines.discipline_id')
         ->where('patients.age', '>','12')
         ->where('patients.gender', '=','Lelaki');
         
         $stat_transfer_ward_total_male =  $data_transfer->where([['bed__disciplines.remarks', '=','TRANSFER OUT'],
         ['bed__disciplines.date_bed', '<=', $request -> datereporting]])
         ->where('beds.ward_id', '=', $request -> ward_id);

      $count_transfer_ward_total_male=  $stat_transfer_ward_total_male ->count();

      $kelmarin_total_male = $count_kelmarin_total_male - $count_transfer_ward_total_male;
       

//total_female
$datatable= DB::table('bed__disciplines')

->join('ward_admissions','bed__disciplines.rn','ward_admissions.reg_number')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')         
->join('beds', 'beds.id', 'bed__disciplines.bed_id')
->join('wards','wards.id','beds.ward_id')
->join('disciplines','disciplines.id','bed__disciplines.discipline_id')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')
->where('patients.age', '>','12')
->where('patients.gender', '=','Perempuan');  


$stat_kelmarin_total_female =  $datatable 
->where([['bed__disciplines.remarks', '=','New'],
['bed__disciplines.date_bed', '<', $request -> datereporting]])
->where('beds.ward_id', '=', $request -> ward_id)
->where('ward_discharges.date_dc', '>', $request -> datereporting)
->where('beds.ward_id', '=', $request -> ward_id)


->orWhere(function($datatable )use ($request) 

{ 
      $datatable
      ->where('patients.gender', '=','Perempuan')         
      ->where([['bed__disciplines.remarks', '=','New'],
      ['bed__disciplines.date_bed', '<', $request -> datereporting]])
      ->where('patients.age', '>','12')    
      ->where('beds.ward_id', '=', $request -> ward_id)
      ->where('ward_discharges.reg_number');
});

$count_kelmarin_total_female = $stat_kelmarin_total_female -> count();

$data_transfer= DB::table('bed__disciplines')

->join('ward_admissions','bed__disciplines.rn','ward_admissions.reg_number')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')         
->join('beds', 'beds.id', 'bed__disciplines.bed_id')
->join('wards','wards.id','beds.ward_id')
->join('disciplines','disciplines.id','bed__disciplines.discipline_id')
->where('patients.age', '>','12')
->where('patients.gender', '=','Perempuan');

$stat_transfer_ward_total_female =  $data_transfer->where([['bed__disciplines.remarks', '=','TRANSFER OUT'],
['bed__disciplines.date_bed', '<=', $request -> datereporting]])
->where('beds.ward_id', '=', $request -> ward_id);

$count_transfer_ward_total_female=  $stat_transfer_ward_total_female ->count();

$kelmarin_total_female = $count_kelmarin_total_female - $count_transfer_ward_total_female;



//total kelmarin

$kelmarin_total_total = $kelmarin_total_female + $kelmarin_total_male;




//discipline_male
$datatable= DB::table('bed__disciplines')

->join('ward_admissions','bed__disciplines.rn','ward_admissions.reg_number')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')         
->join('beds', 'beds.id', 'bed__disciplines.bed_id')
->join('wards','wards.id','beds.ward_id')
->join('disciplines','disciplines.id','bed__disciplines.discipline_id')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')
->where('patients.age', '>','12')
->where('patients.gender', '=','Lelaki');  

$stat_kelmarin_discipline_male =  $datatable 
->where([['bed__disciplines.remarks', '=','New'],
['bed__disciplines.date_bed', '<', $request -> datereporting]])
->where('beds.ward_id', '=', $request -> ward_id)
->where('ward_discharges.date_dc', '>', $request -> datereporting)
->where('beds.ward_id', '=', $request -> ward_id)
 ->where('bed__disciplines.discipline_id', '=', $request -> discipline_id)

->orWhere(function($datatable )use ($request) 

{ 
      $datatable
      ->where('patients.gender', '=','Lelaki')         
      ->where([['bed__disciplines.remarks', '=','New'],
      ['bed__disciplines.date_bed', '<', $request -> datereporting]])
      ->where('patients.age', '>','12')    
      ->where('beds.ward_id', '=', $request -> ward_id)
      ->where('bed__disciplines.discipline_id', '=', $request -> discipline_id)
      ->where('ward_discharges.reg_number');
});

$count_kelmarin_discipline_male = $stat_kelmarin_discipline_male -> count();
        $data_transfer= DB::table('bed__disciplines')
        ->join('ward_admissions','bed__disciplines.rn','ward_admissions.reg_number')
        ->join('patients','ward_admissions.kp_passport','patients.kp_passport')         
        ->join('beds', 'beds.id', 'bed__disciplines.bed_id')
        ->join('wards','wards.id','beds.ward_id')
        ->join('disciplines','disciplines.id','bed__disciplines.discipline_id')
        ->where('patients.age', '>','12')
        ->where('patients.gender', '=','Lelaki');
        
        $stat_transfer_ward_total_male =  $data_transfer->where([['bed__disciplines.remarks', '=','TRANSFER OUT'],
        ['bed__disciplines.date_bed', '<=', $request -> datereporting]])
        ->where('beds.ward_id', '=', $request -> ward_id)
        ->where('bed__disciplines.discipline_id', '=', $request -> discipline_id);
        
        $count_transfer_ward_discipline_male=  $stat_transfer_ward_total_male ->count();
        
        
        $kelmarin_discipline_male = $count_kelmarin_discipline_male - $count_transfer_ward_discipline_male;



//discipline_female
$datatable= DB::table('bed__disciplines')

->join('ward_admissions','bed__disciplines.rn','ward_admissions.reg_number')
->join('patients','ward_admissions.kp_passport','patients.kp_passport')         
->join('beds', 'beds.id', 'bed__disciplines.bed_id')
->join('wards','wards.id','beds.ward_id')
->join('disciplines','disciplines.id','bed__disciplines.discipline_id')
->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')
->where('patients.age', '>','12')
->where('patients.gender', '=','Perempuan');  

$stat_kelmarin_discipline_female =  $datatable 
->where([['bed__disciplines.remarks', '=','New'],
['bed__disciplines.date_bed', '<', $request -> datereporting]])
->where('beds.ward_id', '=', $request -> ward_id)
->where('ward_discharges.date_dc', '>', $request -> datereporting)
->where('beds.ward_id', '=', $request -> ward_id)
 ->where('bed__disciplines.discipline_id', '=', $request -> discipline_id)

->orWhere(function($datatable )use ($request) 

{ 
      $datatable
      ->where('patients.gender', '=','Perempuan')         
      ->where([['bed__disciplines.remarks', '=','New'],
      ['bed__disciplines.date_bed', '<', $request -> datereporting]])
      ->where('patients.age', '>','12')    
      ->where('beds.ward_id', '=', $request -> ward_id)
      ->where('bed__disciplines.discipline_id', '=', $request -> discipline_id)
      ->where('ward_discharges.reg_number');
});

$count_kelmarin_discipline_female = $stat_kelmarin_discipline_female -> count();
        $data_transfer= DB::table('bed__disciplines')
        ->join('ward_admissions','bed__disciplines.rn','ward_admissions.reg_number')
        ->join('patients','ward_admissions.kp_passport','patients.kp_passport')         
        ->join('beds', 'beds.id', 'bed__disciplines.bed_id')
        ->join('wards','wards.id','beds.ward_id')
        ->join('disciplines','disciplines.id','bed__disciplines.discipline_id')
        ->where('patients.age', '>','12')
        ->where('patients.gender', '=','Perempuan');
        
        $stat_transfer_ward_total_female =  $data_transfer->where([['bed__disciplines.remarks', '=','TRANSFER OUT'],
        ['bed__disciplines.date_bed', '<=', $request -> datereporting]])
        ->where('beds.ward_id', '=', $request -> ward_id)
        ->where('bed__disciplines.discipline_id', '=', $request -> discipline_id);
        
        $count_transfer_ward_discipline_female=  $stat_transfer_ward_total_female ->count();
        
        
        $kelmarin_discipline_female = $count_kelmarin_discipline_female - $count_transfer_ward_discipline_female;


// ADMISSION STAT

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

$admission_adult_total_male=  $stat_admission_total_male ->count();
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

$admission_adult_total_female=  $stat_admission_total_female ->count();
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

$admission_adult_discipline_male=  $stat_admission_discipline_male ->count();
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

$admission_adult_discipline_female=  $stat_admission_discipline_female ->count();

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

$admission_paeds_total_male=  $stat_admission_total_male ->count();
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

$admission_paeds_total_female=  $stat_admission_total_female ->count();
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

$admission_paeds_discipline_male=  $stat_admission_discipline_male ->count();
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

$admission_paeds_discipline_female=  $stat_admission_discipline_female ->count();


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

$admission_newborn_total_male=  $stat_admission_total_male ->count();
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

$admission_newborn_total_female=  $stat_admission_total_female ->count();
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

$admission_newborn_discipline_male=  $stat_admission_discipline_male ->count();
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

$admission_newborn_discipline_female=  $stat_admission_discipline_female ->count();


// TRANSFER

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





      return response()->json( compact('kelmarin_total_male','kelmarin_total_female','kelmarin_total_total', 'kelmarin_discipline_male',
      'kelmarin_discipline_female','transfer_ward_total_male', 'admission_adult_total_male','admission_adult_total_female' ,'admission_adult_total_total',
      'admission_adult_discipline_female' ,'admission_adult_discipline_male',  'admission_paeds_total_male','admission_paeds_total_female' ,'admission_paeds_total_total',
      'admission_paeds_discipline_female' ,'admission_paeds_discipline_male',  'admission_newborn_total_male','admission_newborn_total_female' ,'admission_newborn_total_total',
      'admission_newborn_discipline_female' ,'admission_newborn_discipline_male',  'transfer_ward_total_male','transfer_ward_total_female' ,'transfer_ward_total_total',
      'transfer_ward_discipline_female' ,'transfer_ward_discipline_male'






     ));
   }
}
