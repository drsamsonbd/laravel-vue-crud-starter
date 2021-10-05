<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class WardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ward = ward::all(); 
           
        $ward = DB::table('wards')
        ->leftJoin('departments', 'departments.id', 'wards.team_id')
        ->select('wards.*', 'departments.name_department')
        ->orderBy('ward','asc')
        ->get();     
        return response()->json($ward);
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
            'ward'=>'required|unique:wards|min:3',
            'capacity'=>'',
            'status'=>''
        ]);
        $ward = new ward;
        $ward->ward = $request->ward;
        $ward->capacity = $request->capacity;
        $ward->status = $request->status;
        $ward->team_id = $request->team_id;
        $ward->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ward  $ward
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ward = DB::table('wards')->where('id',$id)->first();
        return response()->json($ward);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ward  $ward
     * @return \Illuminate\Http\Response
     */
    public function edit(ward $ward)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ward  $ward
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = array();
        $data['ward'] = $request->ward;
        $data['capacity'] = $request->capacity;
        $data['status'] = $request->status;
        $data['team_id'] = $request->team_id;
        DB::table('wards')->where('id',$id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ward  $ward
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('wards')->where('id',$id)->delete();
    }
}
