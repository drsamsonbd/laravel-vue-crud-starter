<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewByRNController extends Controller
{
    public function show(Request $request, $id)
    {
        $reviewbyrn= DB::table('reviews')->where('reviews.reg_number',$id)->first();
                  return response()->json($reviewbyrn);
    }
}
