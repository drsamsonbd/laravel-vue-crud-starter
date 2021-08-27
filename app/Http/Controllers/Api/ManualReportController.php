<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\ManualReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManualReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ManualReport = ManualReport::all();      
        return response()->json($ManualReport);
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

        $ManualReport = new ManualReport;   
$ManualReport -> date = $request -> date;   
$ManualReport -> time = $request -> time;   
$ManualReport -> pkrc = $request -> pkrc;   
$ManualReport -> male = $request -> male;   
$ManualReport -> female = $request -> female;   
$ManualReport -> paeds_male = $request -> paeds_male;   
$ManualReport -> paeds_female = $request -> paeds_female;   
$ManualReport -> new_adm = $request -> new_adm;   
$ManualReport -> step_up = $request -> step_up;   
$ManualReport -> discharged = $request -> discharged;   
$ManualReport -> home_q = $request -> home_q;   
$ManualReport -> pending = $request -> pending;   
$ManualReport -> carer = $request -> carer;   
$ManualReport -> local = $request -> local;   
$ManualReport -> non_local = $request -> non_local;   
$ManualReport -> bor = $request -> bor;   
$ManualReport -> stage_1 = $request -> stage_1;   
$ManualReport -> stage_2 = $request -> stage_2;   
$ManualReport -> stage_3 = $request -> stage_3;   
$ManualReport -> stage_4 = $request -> stage_4;   
$ManualReport -> stage_5 = $request -> stage_5;   
$ManualReport -> stage_1_1 = $request -> stage_1_1;   
$ManualReport -> stage_1_2 = $request -> stage_1_2;   
$ManualReport -> stage_2_1 = $request -> stage_2_1;   
$ManualReport -> stage_2_2 = $request -> stage_2_2;   
$ManualReport -> stage_3_1 = $request -> stage_3_1;   
$ManualReport -> stage_3_2 = $request -> stage_3_2;   
$ManualReport -> stage_4_1 = $request -> stage_4_1;   
$ManualReport -> stage_4_2 = $request -> stage_4_2;   
$ManualReport -> stage_5_1 = $request -> stage_5_1;   
$ManualReport -> stage_5_2 = $request -> stage_5_2;   
$ManualReport -> staff = $request -> staff;   
$ManualReport -> pui_adult_male = $request -> pui_adult_male;   
$ManualReport -> pui_adult_female = $request -> pui_adult_female;   
$ManualReport -> pui_paeds_male = $request -> pui_paeds_male;   
$ManualReport -> pui_paeds_female = $request -> pui_paeds_female;   
$ManualReport -> pui_new = $request -> pui_new;   
$ManualReport -> pui_discharged = $request -> pui_discharged;   
$ManualReport -> pui_death = $request -> pui_death;   
$ManualReport -> notes = $request -> notes;   

        $ManualReport->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ManualReport  $ManualReport
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ManualReport = DB::table('manual_reports')->where('id',$id)->first();
        return response()->json($ManualReport);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ManualReport  $ManualReport
     * @return \Illuminate\Http\Response
     */
    public function edit(ManualReport $ManualReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ManualReport  $ManualReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = array();
$data ['date'] = $request -> date;  
$data ['time'] = $request -> time;  
$data ['pkrc'] = $request -> pkrc;  
$data ['male'] = $request -> male;  
$data ['female'] = $request -> female;  
$data ['paeds_male'] = $request -> paeds_male;  
$data ['paeds_female'] = $request -> paeds_female;  
$data ['new_adm'] = $request -> new_adm;  
$data ['step_up'] = $request -> step_up;  
$data ['discharged'] = $request -> discharged;  
$data ['home_q'] = $request -> home_q;  
$data ['pending'] = $request -> pending;  
$data ['carer'] = $request -> carer;  
$data ['local'] = $request -> local;  
$data ['non_local'] = $request -> non_local;  
$data ['bor'] = $request -> bor;  
$data ['stage_1'] = $request -> stage_1;  
$data ['stage_2'] = $request -> stage_2;  
$data ['stage_3'] = $request -> stage_3;  
$data ['stage_4'] = $request -> stage_4;  
$data ['stage_5'] = $request -> stage_5;  
$data ['stage_1_1'] = $request -> stage_1_1;  
$data ['stage_1_2'] = $request -> stage_1_2;  
$data ['stage_2_1'] = $request -> stage_2_1;  
$data ['stage_2_2'] = $request -> stage_2_2;  
$data ['stage_3_1'] = $request -> stage_3_1;  
$data ['stage_3_2'] = $request -> stage_3_2;  
$data ['stage_4_1'] = $request -> stage_4_1;  
$data ['stage_4_2'] = $request -> stage_4_2;  
$data ['stage_5_1'] = $request -> stage_5_1;  
$data ['stage_5_2'] = $request -> stage_5_2;  
$data ['staff'] = $request -> staff;  
$data ['pui_adult_male'] = $request -> pui_adult_male;  
$data ['pui_adult_female'] = $request -> pui_adult_female;  
$data ['pui_paeds_male'] = $request -> pui_paeds_male;  
$data ['pui_paeds_female'] = $request -> pui_paeds_female;  
$data ['pui_new'] = $request -> pui_new;  
$data ['pui_discharged'] = $request -> pui_discharged;  
$data ['pui_death'] = $request -> pui_death;  
$data ['notes'] = $request -> notes;  


        DB::table('manual_reports')->where('id',$id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ManualReport  $ManualReport
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('manual_reports')->where('id',$id)->delete();
    }
}
