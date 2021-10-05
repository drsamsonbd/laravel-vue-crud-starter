<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Bed_Discipline;


class BedDisciplineController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
   {
       $bed_discipline = bed_discipline::all();      
       return response()->json($bed_discipline);
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

       $bed_discipline = new bed_discipline; 
       $bed_discipline->  rn = $request ->  rn; 
       $bed_discipline -> date_bed =$request -> date_bed;
       $bed_discipline -> time_bed =$request -> time_bed;
       $bed_discipline->  bed_id = $request ->  bed_id; 
       $bed_discipline->  discipline_id = $request ->  discipline_id; 
       $bed_discipline->  remarks = $request -> remarks;
       $bed_discipline->  status = $request -> status;
         $bed_discipline->save();
      
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\bed_discipline  $bed_discipline
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
       $bed_discipline = DB::table('bed__disciplines')->where('id',$id)->first();
       return response()->json($bed_discipline);
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\bed_discipline  $bed_discipline
    * @return \Illuminate\Http\Response
    */
   public function edit(bed_discipline $bed_discipline)
   {
       //
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\bed_discipline  $bed_discipline
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {
       $data = array();
        $data ['rn'] = $request ->      rn; 
        $data ['date_bed'] = $request ->    date_bed;
        $data ['time_bed'] = $request ->    time_bed;
        $data ['bed_id'] = $request ->      bed_id; 
        $data ['discipline_id'] = $request ->   discipline_id; 
        $data ['remarks'] = $request ->     remarks; 
        $data ['status'] = $request ->     status; 
       DB::table('bed__disciplines')->where('id',$id)->update($data);
   }
   public function updateStatus(Request $request, $id)
   {
       $data = array();
        $data ['status'] = $request ->     status; 
       DB::table('bed__disciplines')->where('id',$id)->update($data);
   }
   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\bed_discipline  $bed_discipline
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       DB::table('bed__disciplines')->where('id',$id)->delete();
   }
}
