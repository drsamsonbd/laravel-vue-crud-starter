<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\case_reg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CaseRegController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $case_reg = case_reg::all();      
        return response()->json($case_reg);
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
            
            'kp_passport'=>'required',
            'year'=>'required',
            'epid_week'=>'required',
            'cumulative'=>'required',
            'date_report_KKM'=>'required',
            'daily_number'=>'required',
            'district'=>'required',
            'locality'=>'required',
            'treating_hospital'=>'',


        ]);
        $case_reg = new case_reg;
        $case_reg->kp_passport          = $request->        kp_passport;
        $case_reg->year                 = $request->        year;
        $case_reg->epid_week            = $request->        epid_week;
        $case_reg->cumulative           = $request->        cumulative;
        $case_reg->date_report_KKM      = $request->        date_report_KKM;
        $case_reg->daily_number         = $request->        daily_number;
        $case_reg->district             = $request->        district;
        $case_reg->locality             = $request->        locality;
        $case_reg->treating_hospital    = $request->        treating_hospital;


        $case_reg->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\case_reg  $case_reg
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $case_reg = DB::table('case_regs')->where('id',$id)->first();
        return response()->json($case_reg);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\case_reg  $case_reg
     * @return \Illuminate\Http\Response
     */
    public function edit(case_reg $case_reg)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\case_reg  $case_reg
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = array();
        $data['kp_passport']        =$request->kp_passport;
        $data['year']               =$request->year;
        $data['epid_week']          =$request->epid_week;
        $data['cumulative']         =$request->cumulative;
        $data['date_report_KKM']    =$request->date_report_KKM;
        $data['daily_number']       =$request->daily_number;
        $data['district']           =$request->district;
        $data['locality']           =$request->locality;
        $data['treating_hospital']  =$request->treating_hospital;

        DB::table('case_regs')->where('id',$id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\case_reg  $case_reg
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('case_regs')->where('id',$id)->delete();
    }
}
