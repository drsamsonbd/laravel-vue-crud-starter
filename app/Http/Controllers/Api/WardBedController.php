<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class WardBedController extends Controller
{
    public function index()
    {
    $ward_bed= DB::table('beds')
    ->join('wards','wards.id','beds.ward_id')
    ->select('beds.*', 'wards.ward')

    ->get()
    ;
       return response()->json($ward_bed);
 }
 public function show($id)
 {
 $ward_bed= DB::table('beds')->where('beds.id',$id)
 ->join('wards','wards.id','beds.ward_id')
 ->select('beds.*', 'wards.ward')

 ->get()
 ;
    return response()->json($ward_bed);
}
}
