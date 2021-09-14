<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\case_reg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdmissionRecordController extends Controller
{
    public function index()
    {
        $admission= DB::table('admissions')
       ->join('patients','admissions.kp_passport','patients.kp_passport')
       ->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
       ->leftJoin('reviews','admissions.reg_number','=','reviews.reg_number')
       
       ->select('patients.name','patients.kp_passport','patients.gender','patients.age','patients.job','patients.address','admissions.*','discharges.date_dc', 
       'discharges.duration', 'discharges.type_dc', 'discharges.notes','reviews.date_review'
       ,'reviews.reviewing_mo')
       ->orderBy('admissions.reg_number','desc')
       ->get()
       ;
          return response()->json($admission);
    }

    public function show($id)
    {
        $admission= DB::table('admissions')->where('admissions.id',$id)
        ->leftjoin('patients','patients.kp_passport','admissions.kp_passport')
        ->leftjoin('case_regs','patients.kp_passport','case_regs.kp_passport')
        ->leftjoin('case_samplings','patients.kp_passport','case_samplings.kp_passport')
        ->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
       ->leftJoin('reviews','admissions.reg_number','=','reviews.reg_number')
       ->select('patients.name','patients.kp_passport','patients.gender','patients.age',
       'patients.race',
       'patients.nationality',
       'patients.workplace',
       'patients.area','patients.job','patients.address','admissions.id', 'admissions.pkrc', 'admissions.reg_number', 'admissions.marriage', 'admissions.religion', 'admissions.kin', 'admissions.kin_address',
       'admissions.kin_relation', 'admissions.date', 'admissions.time', 'admissions.weight', 'admissions.note',
       'admissions.adm_diagnosis',
       'admissions.adm_stage',
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


        'discharges.date_dc', 'discharges.duration','discharges.diagnosis','discharges.type_dc', 'discharges.type_dc', 'discharges.notes','reviews.date_review',
       'reviews.reviewing_mo', )     
        ->get()     
       ;
          return response()->json($admission);
    }

    public function admissionsKP($id)
    {
        $admission= DB::table('admissions')->where('admissions.kp_passport',$id)
        ->leftjoin('patients','patients.kp_passport','admissions.kp_passport')
        ->leftjoin('case_regs','patients.kp_passport','case_regs.kp_passport')
        ->leftjoin('case_samplings','patients.kp_passport','case_samplings.kp_passport')
        ->leftjoin('discharges','admissions.reg_number','=','discharges.reg_number')
       ->leftJoin('reviews','admissions.reg_number','=','reviews.reg_number')
       ->select('patients.name','patients.kp_passport','patients.gender','patients.age','patients.race',
       'patients.nationality',
       'patients.workplace',
       'patients.area','patients.job','patients.address','admissions.id', 'admissions.pkrc', 'admissions.reg_number', 'admissions.marriage', 'admissions.religion', 'admissions.kin', 'admissions.kin_address',
       'admissions.kin_relation', 'admissions.date', 'admissions.time', 'admissions.weight', 'admissions.note',
       'admissions.adm_diagnosis',
       'admissions.adm_stage',
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


        'discharges.date_dc', 'discharges.duration', 'discharges.type_dc', 'discharges.notes','reviews.date_review',
       'reviews.reviewing_mo', )     
        ->get()     
       ;
          return response()->json($admission);
    }

    public function updatePatient($id)
    {
        $admission= DB::table('admissions')->where('admissions.id',$id)
        ->join('patients','patients.kp_passport','=','admissions.kp_passport')
       ->select('patients.*' )
       ->get()   ;     
   
       
          return response()->json($admission);
    }

    public function updateCase($id)
    {
        $case= DB::table('admissions')->where('admissions.id',$id)
        ->join('case_regs','case_regs.kp_passport','=','admissions.kp_passport')
       ->select('case_regs.*' )
       ->get()   ;     
   
       
          return response()->json($case);
    }


    public function updateSampling($id)
    {
        $case= DB::table('admissions')->where('admissions.id',$id)
        ->join('case_samplings','case_samplings.kp_passport','=','admissions.kp_passport')
        ->join('patients','patients.kp_passport','=','admissions.kp_passport')
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
}
