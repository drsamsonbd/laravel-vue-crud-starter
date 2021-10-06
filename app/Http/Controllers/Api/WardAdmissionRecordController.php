<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\case_reg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WardAdmissionRecordController extends Controller
{
    public function index()
    {
        $admission= DB::table('ward_admissions')
       ->join('patients','ward_admissions.kp_passport','patients.kp_passport')
       ->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')
       ->leftJoin('reviews','ward_admissions.reg_number','=','reviews.reg_number')
       
       ->select('patients.name','patients.kp_passport','patients.gender','patients.age','patients.job','patients.address','ward_admissions.*','ward_discharges.date_dc', 
       'ward_discharges.duration', 'ward_discharges.type_dc', 'ward_discharges.notes','reviews.date_review'
       ,'reviews.reviewing_mo')
       ->orderBy('ward_admissions.reg_number','desc')
       ->get()
       ;
          return response()->json($admission);
    }

    public function show($id)
    {
        $admission= DB::table('bed__disciplines')->where('bed__disciplines.id',$id)
        ->leftjoin('ward_admissions','ward_admissions.reg_number','bed__disciplines.rn')
        ->leftjoin('patients','patients.kp_passport','ward_admissions.kp_passport')
        ->leftjoin('case_regs','patients.kp_passport','case_regs.kp_passport')
        ->leftjoin('case_samplings','patients.kp_passport','case_samplings.kp_passport')
        ->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')
        ->leftJoin('reviews','ward_admissions.reg_number','=','reviews.reg_number')
      
      
      
       ->leftjoin('disciplines','disciplines.id','bed__disciplines.discipline_id')
       ->leftjoin('beds','beds.id','bed__disciplines.bed_id')
       ->leftJoin('wards', 'wards.id', 'beds.ward_id')
       ->leftjoin('diagnoses','diagnoses.patient_reg_number','bed__disciplines.rn')
       ->where('diagnoses.status','=',1)
       ->leftjoin('vaccination_statuses','vaccination_statuses.patient_kp_passport','patients.kp_passport')
      
       ->select('patients.name','patients.kp_passport','patients.gender','patients.age',
       'patients.race',
       'patients.nationality',
       'patients.workplace',
       'patients.area','patients.job','patients.address','ward_admissions.id', 'ward_admissions.ward',
        'ward_admissions.reg_number', 'ward_admissions.marriage', 'ward_admissions.religion', 'ward_admissions.kin', 
        'ward_admissions.kin_address',
       'ward_admissions.kin_relation', 'ward_admissions.date', 'ward_admissions.time', 'ward_admissions.weight',
        'ward_admissions.note',
      
       DB::raw('(diagnoses.id) AS Did'), 
       'diagnoses.diagnosis',
       'diagnoses.stage',
       'case_regs.year',
       'case_regs.epid_week',
       'case_regs.cumulative',
       'case_regs.date_report_KKM',
       'case_regs.daily_number',
       'case_regs.district',
       'case_regs.locality',
       'case_regs.treating_hospital',
       'case_samplings.symptomatic',
       'case_samplings.onset',
       'case_samplings.screening_type',
       'case_samplings.exposure_type',
       'case_samplings.reinfection',
       'case_samplings.date_sample',
       'case_samplings.date_mka',
       'case_samplings.type_sample',
       'case_samplings.grading',
       'case_samplings.date_result',
       DB::raw('(vaccination_statuses.id) AS vaccinations_status_id'), 
       'vaccination_statuses.vaccine',
       'vaccination_statuses.date_first',
       'vaccination_statuses.date_second',
       'case_samplings.notes',
       DB::raw('(beds.id) AS bed_id'), 
       'beds.bed_code', 'bed__disciplines.rn', DB::raw('(bed__disciplines.id) AS BDid'), 
       'bed__disciplines.discipline_id', 'bed__disciplines.date_bed', 'bed__disciplines.time_bed', 'disciplines.discipline',
       'bed__disciplines.status', 
        'ward_discharges.date_dc', 'ward_discharges.duration',DB::raw('(ward_discharges.diagnosis) AS discharge_diagnosis'),'ward_discharges.type_dc', 'ward_discharges.type_dc', 'ward_discharges.notes','reviews.date_review',
       'reviews.reviewing_mo','wards.ward', DB::raw('(wards.id) AS Wardid') ) 
       ->orderby('bed__disciplines.id','desc')    
        ->get()     
       ;
          return response()->json($admission);
    }
    //show by RN
    public function showRN($id)
    {
        $admission= DB::table('bed__disciplines')->where('bed__disciplines.rn',$id)
        
        ->leftjoin('ward_admissions','ward_admissions.reg_number','bed__disciplines.rn')
        ->leftjoin('patients','patients.kp_passport','ward_admissions.kp_passport')
        ->leftjoin('case_regs','patients.kp_passport','case_regs.kp_passport')
        ->leftjoin('case_samplings','patients.kp_passport','case_samplings.kp_passport')
        ->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')
        ->leftJoin('reviews','ward_admissions.reg_number','=','reviews.reg_number')
      
      
      
       ->leftjoin('disciplines','disciplines.id','bed__disciplines.discipline_id')
       ->leftjoin('beds','beds.id','bed__disciplines.bed_id')
       ->leftJoin('wards', 'wards.id', 'beds.ward_id')
       ->leftjoin('diagnoses','diagnoses.patient_reg_number','bed__disciplines.rn')
       ->where('diagnoses.status','=',1)
       ->leftjoin('vaccination_statuses','vaccination_statuses.patient_kp_passport','patients.kp_passport')
      
       ->select('patients.name','patients.kp_passport','patients.gender','patients.age',
       'patients.race',
       'patients.nationality',
       'patients.workplace',
       'patients.area','patients.job','patients.address','ward_admissions.id', 'ward_admissions.ward',
        'ward_admissions.reg_number', 'ward_admissions.marriage', 'ward_admissions.religion', 'ward_admissions.kin', 
        'ward_admissions.kin_address',
       'ward_admissions.kin_relation', 'ward_admissions.date', 'ward_admissions.time', 'ward_admissions.weight',
        'ward_admissions.note',
      
       DB::raw('(diagnoses.id) AS Did'), 
       'diagnoses.diagnosis',
       'diagnoses.stage',
       'case_regs.year',
       'case_regs.epid_week',
       'case_regs.cumulative',
       'case_regs.date_report_KKM',
       'case_regs.daily_number',
       'case_regs.district',
       'case_regs.locality',
       'case_regs.treating_hospital',
       'case_samplings.symptomatic',
       'case_samplings.onset',
       'case_samplings.screening_type',
       'case_samplings.exposure_type',
       'case_samplings.reinfection',
       'case_samplings.date_sample',
       'case_samplings.date_mka',
       'case_samplings.type_sample',
       'case_samplings.grading',
       'case_samplings.date_result',
       DB::raw('(vaccination_statuses.id) AS vaccinations_status_id'), 
       'vaccination_statuses.vaccine',
       'vaccination_statuses.date_first',
       'vaccination_statuses.date_second',
       'case_samplings.notes',
       DB::raw('(beds.id) AS bed_id'), 
       'beds.bed_code', 'bed__disciplines.rn', DB::raw('(bed__disciplines.id) AS BDid'), 
       'bed__disciplines.discipline_id', 'bed__disciplines.date_bed', 'bed__disciplines.time_bed', 'disciplines.discipline',
       'bed__disciplines.status', 
        'ward_discharges.date_dc', 'ward_discharges.duration',DB::raw('(ward_discharges.diagnosis) AS discharge_diagnosis'),'ward_discharges.type_dc', 'ward_discharges.type_dc', 'ward_discharges.notes','reviews.date_review',
       'reviews.reviewing_mo','wards.ward', DB::raw('(wards.id) AS Wardid') ) 
       ->orderby('bed__disciplines.id','desc')    
        ->get()     
       ;
          return response()->json($admission);
    }

    public function admissionsKP($id)
    {
        $admission= DB::table('ward_admissions')->where('ward_admissions.kp_passport',$id)
        ->leftjoin('patients','patients.kp_passport','ward_admissions.kp_passport')
        ->leftjoin('case_regs','patients.kp_passport','case_regs.kp_passport')
        ->leftjoin('case_samplings','patients.kp_passport','case_samplings.kp_passport')
        ->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')
       
       ->leftJoin('bed__disciplines', 'bed__disciplines.rn',  'ward_admissions.reg_number')
       ->leftJoin('beds','beds.id', 'bed__disciplines.bed_id')
       ->leftJoin('wards', 'wards.id',  'beds.ward_id')
       ->leftJoin('disciplines','disciplines.id', 'bed__disciplines.discipline_id') 
       
       ->select('patients.name','patients.kp_passport','patients.gender','patients.age','patients.race',
       'patients.nationality',
       'patients.workplace',
       'patients.area','patients.job','patients.address','ward_admissions.id','ward_admissions.reg_number', 'ward_admissions.marriage', 'ward_admissions.religion', 'ward_admissions.kin', 'ward_admissions.kin_address',
       'ward_admissions.kin_relation', 'ward_admissions.date', 'ward_admissions.time', 'ward_admissions.weight', 'ward_admissions.note',
       'ward_admissions.adm_diagnosis',
       'ward_admissions.adm_stage',
       'case_regs.year',
       'case_regs.epid_week',
       'case_regs.cumulative',
       'case_regs.date_report_KKM',
       'case_regs.daily_number',
       'case_regs.district',
       'case_regs.locality',
       'case_regs.treating_hospital',
       'case_samplings.symptomatic',
       'case_samplings.onset',
       'case_samplings.screening_type',
       'case_samplings.exposure_type',
       'case_samplings.reinfection',
       'case_samplings.date_sample',
       'case_samplings.date_mka',
       'case_samplings.type_sample',
       'case_samplings.grading',
       'case_samplings.date_result',
       'case_samplings.vaccine_type',
       'case_samplings.first_dose_date',
       'case_samplings.second_dose_date',
       'case_samplings.notes',
        DB::raw('max(bed__disciplines.id) AS BDid'),
       'bed__disciplines.rn', 
       'bed__disciplines.date_bed',
       'bed__disciplines.time_bed',
       'bed__disciplines.bed_id', 
       'bed__disciplines.discipline_id', 
       'bed__disciplines.remarks', 
       'beds.bed_code',
       'disciplines.discipline',
        'wards.ward',
        'ward_discharges.date_dc', 'ward_discharges.duration', 'ward_discharges.type_dc', 'ward_discharges.notes' )  
        
        ->orderby('bed__disciplines.id','desc')
        ->get()     
       ;
          return response()->json($admission);
    }

    public function updatePatient($id)
    {
        $admission= DB::table('ward_admissions')->where('ward_admissions.id',$id)
        ->join('patients','patients.kp_passport','=','ward_admissions.kp_passport')
       ->select('patients.*' )
       ->get()   ;     
   
       
          return response()->json($admission);
    }

    public function updateCase($id)
    {
        $case= DB::table('ward_admissions')->where('ward_admissions.id',$id)
        ->join('case_regs','case_regs.kp_passport','=','ward_admissions.kp_passport')
       ->select('case_regs.*' )
       ->get()   ;     
   
       
          return response()->json($case);
    }


    public function updateSampling($id)
    {
        $case= DB::table('ward_admissions')->where('ward_admissions.id',$id)
        ->join('case_samplings','case_samplings.kp_passport','=','ward_admissions.kp_passport')
        ->join('patients','patients.kp_passport','=','ward_admissions.kp_passport')
       ->select('case_samplings.*','patients.name' )
       ->get()   ;     
   
       
          return response()->json($case);
    }

    public function kp_passport($id)
    {
        $patient= DB::table('patients')->where('kp_passport',$id)        
        ->get()   ;   
          return response()->json($patient);
    }

    public function search(Request $request)
    {
        $admission= DB::table('ward_admissions')        
        ->where('ward_admissions.date','>=', $request->date_from)
        ->where('ward_admissions.date','<=', $request->date_until)
        ->leftjoin('bed__disciplines','ward_admissions.reg_number','bed__disciplines.rn')
        
        ->leftjoin('patients','patients.kp_passport','ward_admissions.kp_passport')
      
        ->leftJoin('ward_discharges', 'ward_discharges.reg_number','ward_admissions.reg_number')     
      
       ->leftjoin('disciplines','disciplines.id','bed__disciplines.discipline_id')
       ->leftjoin('beds','beds.id','bed__disciplines.bed_id')
       ->leftJoin('wards', 'wards.id', 'beds.ward_id')
       ->leftjoin('diagnoses','diagnoses.patient_reg_number','bed__disciplines.rn')
       ->where('diagnoses.status','=',1)
       ->leftjoin('vaccination_statuses','vaccination_statuses.patient_kp_passport','patients.kp_passport')
      
       ->select('patients.name','patients.kp_passport','patients.gender','patients.age',
       'patients.race',
       'patients.nationality',
       'patients.workplace',
       'patients.area','patients.job','patients.address','ward_admissions.id', 'ward_admissions.ward',
        'ward_admissions.reg_number', 'ward_admissions.marriage', 'ward_admissions.religion', 'ward_admissions.kin', 
        'ward_admissions.kin_address',
       'ward_admissions.kin_relation', 'ward_admissions.date', 'ward_admissions.time', 'ward_admissions.weight',
        'ward_admissions.note',
      
       DB::raw('(diagnoses.id) AS Did'), 
       'diagnoses.diagnosis',
       'diagnoses.stage',
 
       DB::raw('(vaccination_statuses.id) AS vaccinations_status_id'), 
       'vaccination_statuses.vaccine',
       'vaccination_statuses.date_first',
       'vaccination_statuses.date_second',
      
       DB::raw('(beds.id) AS bed_id'), 
       'beds.bed_code', 'bed__disciplines.rn', DB::raw('(bed__disciplines.id) AS BDid'), 
       'bed__disciplines.discipline_id', 'bed__disciplines.date_bed', 'bed__disciplines.time_bed', 'disciplines.discipline',
       'bed__disciplines.status',    
       'wards.ward', DB::raw('(wards.id) AS Wardid') ) 

       ->orderby('ward_admissions.date','asc') 
       ->groupby('ward_admissions.reg_number')   
        ->get()     
       ;
          return response()->json($admission);
    }
    public function searchKPRN($id)
    {
      
       
        $admission= DB::table('patients')        
        ->where('patients.kp_passport', 'like', '%' .$id. '%')
        ->orWhere('patients.name', 'like', '%' .$id. '%')
        ->leftjoin('ward_admissions','ward_admissions.kp_passport','patients.kp_passport')
        ->leftjoin('bed__disciplines','ward_admissions.reg_number','bed__disciplines.rn')
        
        
      
      
      
       ->leftjoin('disciplines','disciplines.id','bed__disciplines.discipline_id')
       ->leftjoin('beds','beds.id','bed__disciplines.bed_id')
       ->leftJoin('wards', 'wards.id', 'beds.ward_id')
       ->leftjoin('diagnoses','diagnoses.patient_reg_number','bed__disciplines.rn')
       ->where('diagnoses.status','=',1)
       ->leftjoin('vaccination_statuses','vaccination_statuses.patient_kp_passport','patients.kp_passport')
      
       ->select('patients.name','patients.kp_passport','patients.gender','patients.age',
       'patients.race',
       'patients.nationality',
       'patients.workplace',
       'patients.area','patients.job','patients.address','ward_admissions.id', 'ward_admissions.ward',
        'ward_admissions.reg_number', 'ward_admissions.marriage', 'ward_admissions.religion', 'ward_admissions.kin', 
        'ward_admissions.kin_address',
       'ward_admissions.kin_relation', 'ward_admissions.date', 'ward_admissions.time', 'ward_admissions.weight',
        'ward_admissions.note',
      
       DB::raw('(diagnoses.id) AS Did'), 
       'diagnoses.diagnosis',
       'diagnoses.stage',
 
       DB::raw('(vaccination_statuses.id) AS vaccinations_status_id'), 
       'vaccination_statuses.vaccine',
       'vaccination_statuses.date_first',
       'vaccination_statuses.date_second',
      
       DB::raw('(beds.id) AS bed_id'), 
       'beds.bed_code', 'bed__disciplines.rn', DB::raw('(bed__disciplines.id) AS BDid'), 
       'bed__disciplines.discipline_id', 'bed__disciplines.date_bed', 'bed__disciplines.time_bed', 'disciplines.discipline',
       'bed__disciplines.status',    
       'wards.ward', DB::raw('(wards.id) AS Wardid') ) 

       ->orderby('ward_admissions.date','asc') 
       ->groupby('ward_admissions.reg_number')   
        ->get()     
       ;
          return response()->json($admission);
    }

    public function searchDischarge(Request $request)
    {
        $admission= DB::table('ward_discharges')        
        ->where('ward_discharges.date_dc','>=', $request->date_from)
        ->where('ward_discharges.date_dc','<=', $request->date_until)
        ->join('ward_admissions','ward_admissions.reg_number', 'ward_discharges.reg_number')
        ->join('bed__disciplines','ward_admissions.reg_number','bed__disciplines.rn')
        
        ->join('patients','patients.kp_passport','ward_admissions.kp_passport')
      
      
      
       ->join('disciplines','disciplines.id','bed__disciplines.discipline_id')
       ->join('beds','beds.id','bed__disciplines.bed_id')
       ->Join('wards', 'wards.id', 'beds.ward_id')
       ->join('diagnoses','diagnoses.patient_reg_number','bed__disciplines.rn')
       ->where('diagnoses.status','=',1)
       ->join('vaccination_statuses','vaccination_statuses.patient_kp_passport','patients.kp_passport')
      
       ->select('patients.name','patients.kp_passport','patients.gender','patients.age',
       'patients.race',
       'patients.nationality',
       'patients.workplace',
       'patients.area','patients.job','patients.address','ward_admissions.id', 'ward_admissions.ward',
        'ward_admissions.reg_number', 'ward_admissions.marriage', 'ward_admissions.religion', 'ward_admissions.kin', 
        'ward_admissions.kin_address',
       'ward_admissions.kin_relation', 'ward_admissions.date', 'ward_admissions.time', 'ward_admissions.weight',
        'ward_admissions.note',
      
       DB::raw('(diagnoses.id) AS Did'), 
       'diagnoses.diagnosis',
       'diagnoses.stage',
 
       DB::raw('(vaccination_statuses.id) AS vaccinations_status_id'), 
       'vaccination_statuses.vaccine',
       'vaccination_statuses.date_first',
       'vaccination_statuses.date_second',
      
       DB::raw('(beds.id) AS bed_id'), 
       'beds.bed_code', 'bed__disciplines.rn', DB::raw('(bed__disciplines.id) AS BDid'), 
       'bed__disciplines.discipline_id', 'bed__disciplines.date_bed', 'bed__disciplines.time_bed', 'disciplines.discipline',
       'bed__disciplines.status',    
       'wards.ward', DB::raw('(wards.id) AS Wardid'),   'ward_discharges.date_dc', 'ward_discharges.duration', 'ward_discharges.type_dc', 'ward_discharges.notes' )   

       ->orderby('ward_admissions.date','asc') 
       ->groupby('ward_admissions.reg_number')   
        ->get()     
       ;
          return response()->json($admission);
    }
}
