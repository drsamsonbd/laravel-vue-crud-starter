<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\screening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class screeningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $screening = screening::all();      
        return response()->json($screening);
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
            'screening'=>'required|unique:screenings|min:3'
        ]);
        $screening = new screening;
        $screening->screening = $request->screening;
        $screening->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\screening  $screening
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $screening = DB::table('screenings')->where('id',$id)->first();
        return response()->json($screening);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\screening  $screening
     * @return \Illuminate\Http\Response
     */
    public function edit(screening $screening)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\screening  $screening
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = array();
        $data['screening'] = $request->screening;
        DB::table('screenings')->where('id',$id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\screening  $screening
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('screenings')->where('id',$id)->delete();
    }
}
