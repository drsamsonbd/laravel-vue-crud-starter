<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\VaccinationStatus;
class VaccinationStatusController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vaccination_status = VaccinationStatus::all();      
        return response()->json($vaccination_status);
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
 
        $vaccination_status = new VaccinationStatus; 
       $vaccination_status -> patient_kp_passport = $request ->     patient_kp_passport;
       $vaccination_status -> vaccine = $request ->     vaccine;
       $vaccination_status -> date_first = $request ->  date_first;
       $vaccination_status -> date_second = $request ->     date_second;
       $vaccination_status -> remarks = $request ->     remarks;
          $vaccination_status->save();
       
    }
 
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\vaccination_status  $vaccination_status
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vaccination_status = DB::table('vaccination_statuses')->where('id',$id)->first();
        return response()->json($vaccination_status);
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\vaccination_status  $vaccination_status
     * @return \Illuminate\Http\Response
     */
    public function edit(VaccinationStatus $vaccination_status)
    {
        //
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\vaccination_status  $vaccination_status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = array();
        $data['patient_kp_passport'] = $request ->   patient_kp_passport;
        $data['vaccine'] = $request ->   vaccine;
        $data['date_first'] = $request ->   date_first;
        $data['date_second'] = $request ->   date_second;
        $data['remarks'] = $request ->   remarks;
        DB::table('vaccination_statuses')->where('id',$id)->update($data);
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vaccination_status  $vaccination_status
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('vaccination_statuses')->where('id',$id)->delete();
    }
}
