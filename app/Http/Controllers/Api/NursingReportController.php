<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\NursingReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NursingReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $NursingReport = NursingReport::all();      
        return response()->json($NursingReport);
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

$NursingReport = new NursingReport;   
$NursingReport -> date = $request -> date;   
$NursingReport -> shift = $request ->    shift;
$NursingReport -> name_kj = $request ->    name_kj;
$NursingReport -> acute = $request ->    acute;
$NursingReport -> children = $request ->    children;
$NursingReport -> female = $request ->    female;
$NursingReport -> maternity = $request ->    maternity;
$NursingReport -> male = $request ->    male;
$NursingReport -> tb = $request ->    tb;
$NursingReport -> covid = $request ->    covid;
$NursingReport -> o2_conc = $request ->    o2_conc;
$NursingReport -> o2_conc_occupied = $request ->    o2_conc_occupied;
$NursingReport -> o2_cylinder = $request ->    o2_cylinder;
$NursingReport -> o2_cylinder_occupied = $request ->    o2_cylinder_occupied;
$NursingReport -> bor = $request ->    bor;
$NursingReport -> paeds_male = $request ->    paeds_male;
$NursingReport -> paeds_female = $request ->    paeds_female;
$NursingReport -> new_adm = $request ->    new_adm;
$NursingReport -> newstage_1 = $request ->    newstage_1;
$NursingReport -> newstage_2 = $request ->    newstage_2;
$NursingReport -> newstage_3 = $request ->    newstage_3;
$NursingReport -> newstage_4 = $request ->    newstage_4;
$NursingReport -> newstage_5 = $request ->    newstage_5;
$NursingReport -> discharged = $request ->    discharged;
$NursingReport -> covid_discharged = $request ->    covid_discharged;
$NursingReport -> pending = $request ->    pending;
$NursingReport -> stage_1 = $request ->    stage_1;
$NursingReport -> stage_2 = $request ->    stage_2;
$NursingReport -> stage_3 = $request ->    stage_3;
$NursingReport -> stage_4 = $request ->    stage_4;
$NursingReport -> stage_5 = $request ->    stage_5;
$NursingReport -> stage_1_1 = $request ->    stage_1_1;
$NursingReport -> stage_1_2 = $request ->    stage_1_2;
$NursingReport -> stage_2_1 = $request ->    stage_2_1;
$NursingReport -> stage_2_2 = $request ->    stage_2_2;
$NursingReport -> stage_3_1 = $request ->    stage_3_1;
$NursingReport -> stage_3_2 = $request ->    stage_3_2;
$NursingReport -> stage_4_1 = $request ->    stage_4_1;
$NursingReport -> stage_4_2 = $request ->    stage_4_2;
$NursingReport -> stage_5_1 = $request ->    stage_5_1;
$NursingReport -> stage_5_2 = $request ->    stage_5_2;
$NursingReport -> staff = $request ->    staff;
$NursingReport -> covid_adult_male = $request -> covid_adult_male;
$NursingReport -> covid_adult_female = $request -> covid_adult_female;
$NursingReport -> covid_paeds_male = $request -> covid_paeds_male;
$NursingReport -> covid_paeds_female = $request -> covid_paeds_female;
$NursingReport -> covid_local = $request -> covid_local;
$NursingReport -> covid_non_local = $request -> covid_non_local;
$NursingReport -> pui_adult_male = $request ->    pui_adult_male;
$NursingReport -> pui_adult_female = $request ->    pui_adult_female;
$NursingReport -> pui_paeds_male = $request ->    pui_paeds_male;
$NursingReport -> pui_paeds_female = $request ->    pui_paeds_female;
$NursingReport -> pui_new = $request ->    pui_new;
$NursingReport -> pui_discharged = $request ->    pui_discharged;
$NursingReport -> pui_death = $request ->    pui_death;
$NursingReport -> covid_death = $request ->    covid_death;
$NursingReport -> notes = $request ->    notes; 

        $NursingReport->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NursingReport  $NursingReport
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $NursingReport = DB::table('nursing_reports')->where('id',$id)->first();
        return response()->json($NursingReport);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NursingReport  $NursingReport
     * @return \Illuminate\Http\Response
     */
    public function edit(NursingReport $NursingReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NursingReport  $NursingReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = array(); 
$data ['date'] = $request ->   date;
$data ['shift'] = $request ->     shift;
$data ['name_kj'] = $request ->     name_kj;
$data ['acute'] = $request ->     acute;
$data ['children'] = $request ->     children;
$data ['female'] = $request ->     female;
$data ['maternity'] = $request ->     maternity;
$data ['male'] = $request ->     male;
$data ['tb'] = $request ->     tb;
$data ['covid'] = $request ->     covid;
$data ['o2_conc'] = $request ->     o2_conc;
$data ['o2_conc_occupied'] = $request ->     o2_conc_occupied;
$data ['o2_cylinder'] = $request ->     o2_cylinder;
$data ['o2_cylinder_occupied'] = $request ->     o2_cylinder_occupied;
$data ['bor'] = $request ->     bor;
$data ['paeds_male'] = $request ->     paeds_male;
$data ['paeds_female'] = $request ->     paeds_female;
$data ['new_adm'] = $request ->     new_adm;
$data ['newstage_1'] = $request ->     newstage_1;
$data ['newstage_2'] = $request ->     newstage_2;
$data ['newstage_3'] = $request ->     newstage_3;
$data ['newstage_4'] = $request ->     newstage_4;
$data ['newstage_5'] = $request ->     newstage_5;
$data ['discharged'] = $request ->     discharged;
$data ['covid_discharged'] = $request ->     covid_discharged;
$data ['pending'] = $request ->     pending;
$data ['stage_1'] = $request ->     stage_1;
$data ['stage_2'] = $request ->     stage_2;
$data ['stage_3'] = $request ->     stage_3;
$data ['stage_4'] = $request ->     stage_4;
$data ['stage_5'] = $request ->     stage_5;
$data ['stage_1_1'] = $request ->     stage_1_1;
$data ['stage_1_2'] = $request ->     stage_1_2;
$data ['stage_2_1'] = $request ->     stage_2_1;
$data ['stage_2_2'] = $request ->     stage_2_2;
$data ['stage_3_1'] = $request ->     stage_3_1;
$data ['stage_3_2'] = $request ->     stage_3_2;
$data ['stage_4_1'] = $request ->     stage_4_1;
$data ['stage_4_2'] = $request ->     stage_4_2;
$data ['stage_5_1'] = $request ->     stage_5_1;
$data ['stage_5_2'] = $request ->     stage_5_2;
$data ['staff'] = $request ->     staff;
$data ['covid_adult_male'] = $request -> covid_adult_male;
$data ['covid_adult_female'] = $request -> covid_adult_female;
$data ['covid_paeds_male'] = $request -> covid_paeds_male;
$data ['covid_paeds_female'] = $request -> covid_paeds_female;
$data ['covid_local'] = $request -> covid_local;
$data ['covid_non_local'] = $request -> covid_non_local;
$data ['pui_adult_male'] = $request ->     pui_adult_male;
$data ['pui_adult_female'] = $request ->     pui_adult_female;
$data ['pui_paeds_male'] = $request ->     pui_paeds_male;
$data ['pui_paeds_female'] = $request ->     pui_paeds_female;
$data ['pui_new'] = $request ->     pui_new;
$data ['pui_discharged'] = $request ->     pui_discharged;
$data ['pui_death'] = $request ->     pui_death;
$data ['covid_death'] = $request ->     covid_death;
$data ['notes'] = $request ->     notes;

        DB::table('nursing_reports')->where('id',$id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NursingReport  $NursingReport
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('nursing_reports')->where('id',$id)->delete();
    }
}
