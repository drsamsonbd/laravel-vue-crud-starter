<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\district;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class districtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $district = district::all();      
        return response()->json($district);
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
            'district'=>'required|unique:districts|min:3'
        ]);
        $district = new district;
        $district->district = $request->district;
        $district->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\district  $district
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $district = DB::table('districts')->where('id',$id)->first();
        return response()->json($district);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\district  $district
     * @return \Illuminate\Http\Response
     */
    public function edit(district $district)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\district  $district
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = array();
        $data['district'] = $request->district;
        DB::table('districts')->where('id',$id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\district  $district
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('districts')->where('id',$id)->delete();
    }
}
