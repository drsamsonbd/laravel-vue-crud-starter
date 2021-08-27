<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\locality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class localityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locality = locality::all();      
        return response()->json($locality);
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
            'locality'=>'required|unique:localities|min:3'
        ]);
        $locality = new locality;
        $locality->locality = $request->locality;
        $locality->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\locality  $locality
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $locality = DB::table('localities')->where('id',$id)->first();
        return response()->json($locality);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\locality  $locality
     * @return \Illuminate\Http\Response
     */
    public function edit(locality $locality)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\locality  $locality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = array();
        $data['locality'] = $request->locality;
        DB::table('localities')->where('id',$id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\locality  $locality
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('localities')->where('id',$id)->delete();
    }
}
