<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\vaccination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class vaccinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vaccination = vaccination::all();      
        return response()->json($vaccination);
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
      
        $vaccination = new vaccination;
       $vaccination-> date_vaccination = $request -> date_vaccination;
       $vaccination-> appointment = $request ->         appointment;
       $vaccination-> eligible = $request ->         eligible;
       $vaccination-> aefi = $request ->         aefi;
       $vaccination-> notes = $request ->         notes;
        $vaccination->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\vaccination  $vaccination
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vaccination = DB::table('vaccinations')->where('id',$id)->first();
        return response()->json($vaccination);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\vaccination  $vaccination
     * @return \Illuminate\Http\Response
     */
    public function edit(vaccination $vaccination)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\vaccination  $vaccination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = array();
        $data['date_vaccination'] = $request -> date_vaccination;
        $data['appointment'] = $request ->         appointment;
        $data['eligible'] = $request ->         eligible;
        $data['aefi'] = $request ->         aefi;
        $data['notes'] = $request ->         notes;
        DB::table('vaccinations')->where('id',$id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vaccination  $vaccination
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('vaccinations')->where('id',$id)->delete();
    }
}
