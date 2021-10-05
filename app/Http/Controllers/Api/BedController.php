<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\bed;

class BedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bed = bed::all();      
        return response()->json($bed);
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

        $bed = new bed; 

          $bed->ward_id = $request -> ward_id;
          $bed->bed_number = $request -> bed_number;
          $bed->bed_code = $request -> bed_code;
          $bed->bed_class = $request -> bed_class;
          $bed->notes = $request -> notes;
          $bed->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bed  $bed
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bed = DB::table('beds')->where('id',$id)->first();
        return response()->json($bed);
    }
   
    public function showbyWard($id)
    {
        $bed = DB::table('beds')->where('ward_id',$id)
        ->select('id','bed_code')
        ->get();
        return response()->json($bed);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bed  $bed
     * @return \Illuminate\Http\Response
     */
    public function edit(bed $bed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bed  $bed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = array();
        $data['ward_id'] = $request -> ward_id;
        $data['bed_number'] = $request -> bed_number;
        $data['bed_code'] = $request -> bed_code;
        $data['bed_class'] = $request -> bed_class;
        $data['notes'] = $request -> notes; 
        DB::table('beds')->where('id',$id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bed  $bed
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('beds')->where('id',$id)->delete();
    }
}
