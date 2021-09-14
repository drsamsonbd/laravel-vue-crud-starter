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
        $admission= DB::table('ward_admissions')->where('ward_admissions.id',$id)
        ->leftjoin('patients','patients.kp_passport','ward_admissions.kp_passport')
        ->leftjoin('case_regs','patients.kp_passport','case_regs.kp_passport')
        ->leftjoin('case_samplings','patients.kp_passport','case_samplings.kp_passport')
        ->leftjoin('ward_discharges','ward_admissions.reg_number','=','ward_discharges.reg_number')
       ->leftJoin('reviews','ward_admissions.reg_number','=','reviews.reg_number')
       ->select('patients.name','patients.kp_passport','patients.gender','patients.age',
       'patients.race',
       'patients.nationality',
       'patients.workplace',
       'patients.area','patients.job','patients.address','ward_admissions.id', 'ward_admissions.ward', 'ward_admissions.reg_number', 'ward_admissions.marriage', 'ward_admissions.religion', 'ward_admissions.kin', 'ward_admissions.kin_address',
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


        'ward_discharges.date_dc', 'ward_discharges.duration','ward_discharges.diagnosis','ward_discharges.type_dc', 'ward_discharges.type_dc', 'ward_discharges.notes','reviews.date_review',
       'reviews.reviewing_mo', )     
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
       ->leftJoin('reviews','ward_admissions.reg_number','=','reviews.reg_number')
       ->select('patients.name','patients.kp_passport','patients.gender','patients.age','patients.race',
       'patients.nationality',
       'patients.workplace',
       'patients.area','patients.job','patients.address','ward_admissions.id', 'ward_admissions.ward', 'ward_admissions.reg_number', 'ward_admissions.marriage', 'ward_admissions.religion', 'ward_admissions.kin', 'ward_admissions.kin_address',
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


        'ward_discharges.date_dc', 'ward_discharges.duration', 'ward_discharges.type_dc', 'ward_discharges.notes','reviews.date_review',
       'reviews.reviewing_mo', )     
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
}
