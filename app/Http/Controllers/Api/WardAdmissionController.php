<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\ward_admission;
use Illuminate\Http\Request;

class WardAdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admission = ward_admission::all();      
        return response()->json($admission);
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
        {
            $validateData = $request->validate([
               
                'reg_number'=>'required|unique:ward_admissions',
             
    
            ]);
           $admission = new ward_admission;
           $admission->reg_number = $request-> reg_number;
           $admission->kp_passport = $request-> kp_passport;
           $admission->ward = $request->         ward;
           $admission->marriage = $request->         marriage;
           $admission->religion = $request->         religion;
           $admission->kin = $request->         kin;
           $admission->kin_address = $request->         kin_address;
           $admission->kin_relation = $request->         kin_relation;
           $admission->kin_phone = $request->         kin_phone;
           $admission->date = $request->         date;
           $admission->time = $request->         time;
           $admission->weight = $request->         weight;
           $admission -> adm_diagnosis = $request -> adm_diagnosis;
           $admission -> adm_stage = $request -> adm_stage;
           $admission->note = $request->         note; 
           $admission->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ward_admission  $ward_admission
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admission = DB::table('ward_admissions')->where('id',$id)->first();
        return response()->json($admission);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ward_admission  $ward_admission
     * @return \Illuminate\Http\Response
     */
    public function edit(ward_admission $ward_admission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ward_admission  $ward_admission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = array();
        $data['reg_number']= $request->   reg_number;
        $data['kp_passport']= $request->   kp_passport;
        $data['ward']= $request->          ward;
        $data['marriage']= $request->          marriage;
        $data['religion']= $request->          religion;
        $data['kin']= $request->           kin;
        $data['kin_address']= $request->           kin_address;
        $data['kin_relation']= $request->          kin_relation;
        $data['kin_phone']= $request->         kin_phone;
        $data['date']= $request->          date;
        $data['time']= $request->          time;
        $data['weight']= $request->            weight;
        $data['adm_diagnosis'] = $request -> adm_diagnosis;
        $data['adm_stage'] = $request -> adm_stage;
        $data['note']= $request->          note; 
        DB::table('ward_admissions')->where('id',$id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ward_admission  $ward_admission
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('ward_admissions')->where('id',$id)->delete();
    }
}
