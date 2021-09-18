<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\NursingCensusReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NursingCensusReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $NursingCensus = NursingCensusReport::all();      
        return response()->json($NursingCensus);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
              $NursingCensus = new NursingCensusReport;
              $NursingCensus ->  shift = $request ->   shift;
              $NursingCensus ->  datereporting = $request ->   datereporting;
              $NursingCensus ->  name_kj = $request ->   name_kj;
              $NursingCensus ->  male = $request ->   male;
              $NursingCensus ->  female = $request ->   female;
              $NursingCensus ->  paeds_male = $request ->   paeds_male;
              $NursingCensus ->  paeds_female = $request ->   paeds_female;
              $NursingCensus ->  non_covid_new_admission = $request ->   non_covid_new_admission;
              $NursingCensus ->  non_covid_step_up = $request ->   non_covid_step_up;
              $NursingCensus ->  non_covid_discharged = $request ->   non_covid_discharged;
              $NursingCensus ->  non_covid_death = $request ->   non_covid_death;
              $NursingCensus ->  male_ward = $request ->   male_ward;
              $NursingCensus ->  female_ward = $request ->   female_ward;
              $NursingCensus ->  maternity_ward = $request ->   maternity_ward;
              $NursingCensus ->  children_ward = $request ->   children_ward;
              $NursingCensus ->  male_tb_ward = $request ->   male_tb_ward;
              $NursingCensus ->  female_tb_ward = $request ->   female_tb_ward;
              $NursingCensus ->  acute_ward = $request ->   acute_ward;
              $NursingCensus ->  covid_new_admission = $request ->   covid_new_admission;
              $NursingCensus ->  covid_step_up = $request ->   covid_step_up;
              $NursingCensus ->  covid_discharged = $request ->   covid_discharged;
              $NursingCensus ->  covid_death = $request ->   covid_death;
              $NursingCensus ->  covid_home_q = $request ->   covid_home_q;
              $NursingCensus ->  covid_male = $request ->   covid_male;
              $NursingCensus ->  covid_female = $request ->   covid_female;
              $NursingCensus ->  covid_paeds_male = $request ->   covid_paeds_male;
              $NursingCensus ->  covid_paeds_female = $request ->   covid_paeds_female;
              $NursingCensus ->  covid_local = $request ->   covid_local;
              $NursingCensus ->  covid_non_local = $request ->   covid_non_local;
              $NursingCensus ->  stage_1 = $request ->   stage_1;
              $NursingCensus ->  stage_2 = $request ->   stage_2;
              $NursingCensus ->  stage_3 = $request ->   stage_3;
              $NursingCensus ->  stage_4 = $request ->   stage_4;
              $NursingCensus ->  stage_5 = $request ->   stage_5;
              $NursingCensus ->  stage_1_1 = $request ->   stage_1_1;
              $NursingCensus ->  stage_1_2 = $request ->   stage_1_2;
              $NursingCensus ->  stage_2_1 = $request ->   stage_2_1;
              $NursingCensus ->  stage_2_2 = $request ->   stage_2_2;
              $NursingCensus ->  stage_3_1 = $request ->   stage_3_1;
              $NursingCensus ->  stage_3_2 = $request ->   stage_3_2;
              $NursingCensus ->  stage_4_1 = $request ->   stage_4_1;
              $NursingCensus ->  stage_4_2 = $request ->   stage_4_2;
              $NursingCensus ->  stage_5_1 = $request ->   stage_5_1;
              $NursingCensus ->  stage_5_2 = $request ->   stage_5_2;
              $NursingCensus ->  new_stage_1 = $request ->   new_stage_1;
              $NursingCensus ->  new_stage_2 = $request ->   new_stage_2;
              $NursingCensus ->  new_stage_3 = $request ->   new_stage_3;
              $NursingCensus ->  new_stage_4 = $request ->   new_stage_4;
              $NursingCensus ->  new_stage_5 = $request ->   new_stage_5;
              $NursingCensus ->  pui_adult_male = $request ->   pui_male;
              $NursingCensus ->  pui_adult_female = $request ->   pui_female;
              $NursingCensus ->  pui_paeds_male = $request ->   pui_paeds_male;
              $NursingCensus ->  pui_paeds_female = $request ->   pui_paeds_female;
              $NursingCensus ->  pui_new = $request ->   pui_admission;
              $NursingCensus ->  pui_discharged = $request ->   pui_discharged;
              $NursingCensus ->  pui_step_up = $request ->   pui_step_up;
              $NursingCensus ->  pui_death = $request ->   pui_death;
              $NursingCensus ->  sari_adult_male = $request ->   sari_male;
              $NursingCensus ->  sari_adult_female = $request ->   sari_female;
              $NursingCensus ->  sari_paeds_male = $request ->   sari_paeds_male;
              $NursingCensus ->  sari_paeds_female = $request ->   sari_paeds_female;
              $NursingCensus ->  sari_new = $request ->   sari_admission;
              $NursingCensus ->  sari_discharged = $request ->   sari_discharged;
              $NursingCensus ->  sari_step_up = $request ->   sari_step_up;
              $NursingCensus ->  sari_death = $request ->   sari_death;
              $NursingCensus ->  staff = $request ->   staff;
              $NursingCensus ->  total = $request ->   total;
              $NursingCensus ->  bor = $request ->   bor;
              $NursingCensus ->  notes = $request ->   notes;
                $NursingCensus -> o2_conc = $request -> o2_conc;
                $NursingCensus -> o2_conc_occupied = $request -> o2_conc_occupied;
                $NursingCensus -> o2_cylinder = $request -> o2_cylinder;
                $NursingCensus -> o2_cylinder_occupied = $request -> o2_cylinder_occupied;
                $NursingCensus -> covid_pending = $request -> covid_pending;
              $NursingCensus ->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NursingCensusReport  $nursingCensusReport
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $NursingCensus = DB:: table('nursing_census_reports')->where('id',$id)->first();
        return response()->json($NursingCensus);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NursingCensusReport  $nursingCensusReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)

    {   $data = array(); 
       $data ['shift'] = $request ->   shift;
       $data ['datereporting'] = $request ->   datereporting;
       $data ['name_kj'] = $request ->   name_kj;
       $data ['male'] = $request ->   male;
       $data ['female'] = $request ->   female;
       $data ['paeds_male'] = $request ->   paeds_male;
       $data ['paeds_female'] = $request ->   paeds_female;
       $data ['non_covid_new_admission'] = $request ->   non_covid_new_admission;
       $data ['non_covid_step_up'] = $request ->   non_covid_step_up;
       $data ['non_covid_discharged'] = $request ->   non_covid_discharged;
       $data ['non_covid_death'] = $request ->   non_covid_death;
       $data ['male_ward'] = $request ->   male_ward;
       $data ['female_ward'] = $request ->   female_ward;
       $data ['maternity_ward'] = $request ->   maternity_ward;
       $data ['children_ward'] = $request ->   children_ward;
       $data ['male_tb_ward'] = $request ->   male_tb_ward;
       $data ['female_tb_ward'] = $request ->   female_tb_ward;
       $data ['acute_ward'] = $request ->   acute_ward;
       $data ['covid_new_admission'] = $request ->   covid_new_admission;
       $data ['covid_step_up'] = $request ->   covid_step_up;
       $data ['covid_discharged'] = $request ->   covid_discharged;
       $data ['covid_death'] = $request ->   covid_death;
       $data ['covid_home_q'] = $request ->   covid_home_q;
       $data ['covid_male'] = $request ->   covid_male;
       $data ['covid_female'] = $request ->   covid_female;
       $data ['covid_paeds_male'] = $request ->   covid_paeds_male;
       $data ['covid_paeds_female'] = $request ->   covid_paeds_female;
       $data ['covid_local'] = $request ->   covid_local;
       $data ['covid_non_local'] = $request ->   covid_non_local;
       $data ['stage_1'] = $request ->   stage_1;
       $data ['stage_2'] = $request ->   stage_2;
       $data ['stage_3'] = $request ->   stage_3;
       $data ['stage_4'] = $request ->   stage_4;
       $data ['stage_5'] = $request ->   stage_5;
       $data ['stage_1_1'] = $request ->   stage_1_1;
       $data ['stage_1_2'] = $request ->   stage_1_2;
       $data ['stage_2_1'] = $request ->   stage_2_1;
       $data ['stage_2_2'] = $request ->   stage_2_2;
       $data ['stage_3_1'] = $request ->   stage_3_1;
       $data ['stage_3_2'] = $request ->   stage_3_2;
       $data ['stage_4_1'] = $request ->   stage_4_1;
       $data ['stage_4_2'] = $request ->   stage_4_2;
       $data ['stage_5_1'] = $request ->   stage_5_1;
       $data ['stage_5_2'] = $request ->   stage_5_2;
       $data ['new_stage_1'] = $request ->   new_stage_1;
       $data ['new_stage_2'] = $request ->   new_stage_2;
       $data ['new_stage_3'] = $request ->   new_stage_3;
       $data ['new_stage_4'] = $request ->   new_stage_4;
       $data ['new_stage_5'] = $request ->   new_stage_5;
       $data ['pui_adult_male'] = $request ->   pui_male;
       $data ['pui_adult_female'] = $request ->   pui_female;
       $data ['pui_paeds_male'] = $request ->   pui_paeds_male;
       $data ['pui_paeds_female'] = $request ->   pui_paeds_female;
       $data ['pui_new'] = $request ->   pui_admission;
       $data ['pui_discharged'] = $request ->   pui_discharged;
       $data ['pui_step_up'] = $request ->   pui_step_up;
       $data ['pui_death'] = $request ->   pui_death;
       $data ['sari_adult_male'] = $request ->   sari_male;
       $data ['sari_adult_female'] = $request ->   sari_female;
       $data ['sari_paeds_male'] = $request ->   sari_paeds_male;
       $data ['sari_paeds_female'] = $request ->   sari_paeds_female;
       $data ['sari_new'] = $request ->   sari_admission;
       $data ['sari_discharged'] = $request ->   sari_discharged;
       $data ['sari_step_up'] = $request ->   sari_step_up;
       $data ['sari_death'] = $request ->   sari_death;
       $data ['staff'] = $request ->   staff;
       $data ['total'] = $request ->   total;
       $data ['bor'] = $request ->   bor;
       $data ['notes'] = $request ->   notes;
       $data ['o2_conc'] = $request -> o2_conc;
       $data ['o2_conc_occupied'] = $request -> o2_conc_occupied;
       $data ['o2_cylinder'] = $request -> o2_cylinder;
       $data ['o2_cylinder_occupied'] = $request -> o2_cylinder_occupied;
       $data ['covid_pending'] = $request -> covid_pending;
        DB::table('nursing_census_reports')->where('id',$id)->update($data);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NursingCensusReport  $nursingCensusReport
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('nursing_census_reports')->where('id',$id)->delete();
    }
}
