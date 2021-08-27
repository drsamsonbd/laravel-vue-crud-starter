<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\case_sampling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CaseSamplingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $case_sampling = case_sampling::all();      
        return response()->json($case_sampling);
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
        $validateData = $request->validate([
            
            'kp_passport'=>'required|unique:case_samplings|min:3',
            'symptomatic'=>'',
            'onset'=>'',
            'screening_type'=>'',
            'exposure_type'=>'',
            'reinfection'=>'',
            'date_sample'=>'required',
            'type_sample'=>'required',
            'date_mka'=>'',
            'grading'=>'',
            'date_result'=>'',
            'vaccine_type'=>'',
            '1st_dose_date'=>'',
            '2nd_dose_date'=>'',
            'notes'=>''


        ]);
        $case_sampling = new case_sampling;
        $case_sampling-> kp_passport   = $request->        kp_passport;
        $case_sampling-> symptomatic   = $request->        sypmtomatic;
        $case_sampling-> onset   = $request->        onset;
        $case_sampling-> screening_tpye   = $request->        screening_tpye;
        $case_sampling-> exposure_type   = $request->        exposure_type;
        $case_sampling-> reinfection   = $request->        reinfection;
        $case_sampling-> date_sample   = $request->        date_sample;
        $case_sampling-> date_mka   = $request->        date_mka;
        $case_sampling-> grading   = $request->        grading;
        $case_sampling-> date_result                    = $request -> date_result;
        $case_sampling-> vaccine_type           = $request -> vaccine_type;
        $case_sampling-> first_dose_date          = $request -> first_dose_date;
        $case_sampling-> second_dose_date          = $request ->second_dose_date ;
        $case_sampling-> notes          = $request ->notes  ;
        $case_sampling->save();       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\case_sampling  $case_sampling
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $case_sampling = DB::table('case_samplings')->where('id',$id)->first();
        return response()->json($case_sampling);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\case_sampling  $case_sampling
     * @return \Illuminate\Http\Response
     */
    public function edit(case_sampling $case_sampling)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\case_sampling  $case_sampling
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = array();       

       $data['kp_passport'] =$request -> kp_passport; 
       $data['symptomatic'] =$request -> symptomatic;
       $data['onset'] =$request ->        onset ;
       $data['screening_type'] =$request ->        screening_type;
       $data['exposure_type'] =$request ->        exposure_type;
       $data['reinfection'] =$request ->        reinfection;
       $data['date_sample'] =$request ->        date_sample;
       $data['type_sample'] =$request ->        type_sample;
       $data['date_mka'] =$request ->        date_mka;
       $data['grading'] =$request ->        grading;
       $data['date_result'] =$request ->        date_result;
       $data['vaccine_type'] =$request ->        vaccine_type;
       $data['first_dose_date'] =$request ->        first_dose_date;
       $data['second_dose_date'] =$request ->        second_dose_date;
       $data['notes'] =$request ->        notes;
        DB::table('case_samplings')->where('id',$id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\case_sampling  $case_sampling
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('case_samplings')->where('id',$id)->delete();
    }
}
