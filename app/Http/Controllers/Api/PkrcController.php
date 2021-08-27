<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\pkrc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pkrcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pkrc = pkrc::all();      
        return response()->json($pkrc);
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
            'pkrc'=>'required|unique:pkrcs|min:3',
            'capacity'=>''
        ]);
        $pkrc = new pkrc;
        $pkrc->pkrc = $request->pkrc;
        $pkrc->capacity = $request->capacity;
        $pkrc->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pkrc  $pkrc
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pkrc = DB::table('pkrcs')->where('id',$id)->first();
        return response()->json($pkrc);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pkrc  $pkrc
     * @return \Illuminate\Http\Response
     */
    public function edit(pkrc $pkrc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pkrc  $pkrc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = array();
        $data['pkrc'] = $request->pkrc;
        $data['capacity'] = $request->capacity;
        DB::table('pkrcs')->where('id',$id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pkrc  $pkrc
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('pkrcs')->where('id',$id)->delete();
    }
}
