<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchPatientController extends Controller
{
    public function showbyKPName($id)
    {
        $patient = DB::table('patients')->where('kp_passport', 'like', '%' .$id. '%')
        ->orWhere('name', 'like', '%' .$id. '%')->get();
        return response()->json($patient);
    }

    public function showbyKP($id)
    {
        $patient = DB::table('patients')->where('kp_passport', '=', $id)->get();
      
        return response()->json($patient);
    }
}
