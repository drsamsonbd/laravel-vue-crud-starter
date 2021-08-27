<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class reviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $review = review::all();      
        return response()->json($review);
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
     
        $review = new review;
        
       if(!empty( $request ->warning_sign)){
        $review  -> warning_sign = join(',',$request->warning_sign);
        $review -> kp_passport = $request ->     kp_passport;
        $review -> reg_number = $request -> reg_number;
        $review -> date_review = $request -> date_review;
        $review -> time_review = $request -> time_review;
        $review -> diagnosis = $request -> diagnosis;
        $review -> temp = $request -> temp;
        $review -> pulse = $request -> pulse;
        $review -> resp = $request -> resp;
        $review -> bp = $request -> bp;
        $review -> spo2 = $request -> spo2;
        $review -> pre_spo2 = $request -> pre_spo2;
        $review -> post_spo2 = $request -> post_spo2;
        $review -> reviewnotes = $request -> reviewnotes;
        $review -> plan = $request -> plan;
        $review -> reviewing_mo = $request -> reviewing_mo;
        $review->save();
    } else
    $review -> warning_sign='No';
    $review -> kp_passport = $request ->     kp_passport;
    $review -> reg_number = $request -> reg_number;
    $review -> date_review = $request -> date_review;
    $review -> time_review = $request -> time_review;
    $review -> diagnosis = $request -> diagnosis;
    $review -> temp = $request -> temp;
    $review -> pulse = $request -> pulse;
    $review -> resp = $request -> resp;
    $review -> bp = $request -> bp;
    $review -> spo2 = $request -> spo2;
    $review -> pre_spo2 = $request -> pre_spo2;
    $review -> post_spo2 = $request -> post_spo2;
    $review -> reviewnotes = $request -> reviewnotes;
    $review -> plan = $request -> plan;
    $review -> reviewing_mo = $request -> reviewing_mo;
    $review->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\review  $review
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $review = DB::table('reviews')->where('id',$id)->first();
        return response()->json($review);
    }
    public function ReviewbyRN($id)
    {
        $review = DB::table('reviews')->where('reg_number',$id)->first();
        return response()->json($review);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = array();
        $data['kp_passport'] = $request ->     kp_passport;
        $data['reg_number'] = $request -> reg_number;
        $data['date_review'] = $request -> date_review;
        $data['time_review'] = $request -> time_review;
        $data['diagnosis'] = $request -> diagnosis;
        $data['warning_sign'] = $request -> warning_sign;
        $data['temp'] = $request -> temp;
        $data['pulse'] = $request -> pulse;
        $data['resp'] = $request -> resp;
        $data['bp'] = $request -> bp;
        $data['spo2'] = $request -> spo2;
        $data['pre_spo2'] = $request -> pre_spo2;
        $data['post_spo2'] = $request -> post_spo2;
        $data['reviewnotes'] = $request -> reviewnotes;
        $data['plan'] = $request -> plan;
        $data['reviewing_mo'] = $request -> reviewing_mo;
        DB::table('reviews')->where('id',$id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('reviews')->where('id',$id)->delete();
    }
}
