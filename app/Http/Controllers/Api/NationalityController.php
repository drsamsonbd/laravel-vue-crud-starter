<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\nationality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class nationalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nationality = nationality::all();      
        return response()->json($nationality);
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
            'nationality'=>'required|unique:nationalities|min:3'
        ]);
        $nationality = new nationality;
        $nationality->nationality = $request->nationality;
        $nationality->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\nationality  $nationality
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nationality = DB::table('nationalities')->where('id',$id)->first();
        return response()->json($nationality);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\nationality  $nationality
     * @return \Illuminate\Http\Response
     */
    public function edit(nationality $nationality)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\nationality  $nationality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = array();
        $data['nationality'] = $request->nationality;
        DB::table('nationalities')->where('id',$id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\nationality  $nationality
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('nationalities')->where('id',$id)->delete();
    }
}
