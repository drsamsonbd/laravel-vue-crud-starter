<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class hospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hospital = hospital::all();      
        return response()->json($hospital);
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
            'hospital'=>'required|unique:hospitals|min:3'
        ]);
        $hospital = new hospital;
        $hospital->hospital = $request->hospital;
        $hospital->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hospital = DB::table('hospitals')->where('id',$id)->first();
        return response()->json($hospital);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function edit(hospital $hospital)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = array();
        $data['hospital'] = $request->hospital;
        DB::table('hospitals')->where('id',$id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('hospitals')->where('id',$id)->delete();
    }
}
