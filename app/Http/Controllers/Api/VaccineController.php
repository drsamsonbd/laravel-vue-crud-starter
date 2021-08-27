<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\vaccine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class vaccineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vaccine = vaccine::all();      
        return response()->json($vaccine);
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
            'vaccine'=>'required|unique:vaccines|min:3'
        ]);
        $vaccine = new vaccine;
        $vaccine->vaccine = $request->vaccine;
        $vaccine->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\vaccine  $vaccine
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vaccine = DB::table('vaccines')->where('id',$id)->first();
        return response()->json($vaccine);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\vaccine  $vaccine
     * @return \Illuminate\Http\Response
     */
    public function edit(vaccine $vaccine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\vaccine  $vaccine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = array();
        $data['vaccine'] = $request->vaccine;
        DB::table('vaccines')->where('id',$id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vaccine  $vaccine
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('vaccines')->where('id',$id)->delete();
    }
}
