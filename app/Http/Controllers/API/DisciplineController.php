<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\discipline;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
class DisciplineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discipline = discipline::all();      
        return response()->json($discipline);
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
  
        $discipline = new discipline;
        $discipline->discipline= $request->discipline;      
        $discipline->save();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\discipline  $discipline
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $discipline = DB::table('disciplines')->where('id',$id)->first();
        return response()->json($discipline);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\discipline  $discipline
     * @return \Illuminate\Http\Response
     */
    public function edit(discipline $discipline)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\discipline  $discipline
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = array();
        $data['discipline'] = $request->discipline;
        DB::table('disciplines')->where('id',$id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\discipline  $discipline
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('disciplines')->where('id',$id)->delete();
    }
}
