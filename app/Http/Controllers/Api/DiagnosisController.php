<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\diagnosis;

class DiagnosisController extends Controller
{
   /**
     * Display a listing of the resource.  *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diagnosis = diagnosis::all();      
        return response()->json($diagnosis);
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
 
        $diagnosis = new diagnosis;  
        $diagnosis -> patient_reg_number = $request -> patient_reg_number;
        $diagnosis -> diagnosis = $request -> diagnosis;
        $diagnosis -> stage = $request -> stage;
        $diagnosis -> date_diagnosis = $request -> date_diagnosis;
        $diagnosis -> remarks = $request -> remarks;
        $diagnosis -> status = $request -> status;
          $diagnosis->save();
       
    }
 
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\diagnosis  $diagnosis
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $diagnosis = DB::table('diagnoses')->where('id',$id)->first();
        return response()->json($diagnosis);
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\diagnosis  $diagnosis
     * @return \Illuminate\Http\Response
     */
    public function edit(diagnosis $diagnosis)
    {
        //
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\diagnosis  $diagnosis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = array();
       $data ['patient_reg_number'] = $request -> patient_reg_number;
       $data ['diagnosis'] = $request -> diagnosis;
       $data ['stage'] = $request -> stage;
       $data ['date_diagnosis'] = $request -> date_diagnosis;
       $data ['remarks'] = $request -> remarks; 
       $data ['status'] = $request -> status; 
        DB::table('diagnoses')->where('id',$id)->update($data);
    }

    public function updateStatus(Request $request, $id)
    {
        $data = array();
       $data ['status'] = $request -> status; 
        DB::table('diagnoses')->where('id',$id)->update($data);
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\diagnosis  $diagnosis
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('diagnoses')->where('id',$id)->delete();
    }
}
