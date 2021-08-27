<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\race;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $race = Race::all();      
        return response()->json($race);
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
            'race'=>'required|unique:races|min:3'
        ]);
        $race = new Race;
        $race->race = $request->race;
        $race->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\race  $race
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $race = DB::table('races')->where('id',$id)->first();
        return response()->json($race);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\race  $race
     * @return \Illuminate\Http\Response
     */
    public function edit(race $race)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\race  $race
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = array();
        $data['race'] = $request->race;
        DB::table('races')->where('id',$id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\race  $race
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('races')->where('id',$id)->delete();
    }
}
