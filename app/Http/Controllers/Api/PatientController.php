<?php

namespace App\Http\Controllers\APi;
use App\Http\Controllers\Controller;
use App\Models\patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $patient = Patient::all();
        $patient = DB::table('patients')
        ->orderBy('name','asc')
        ->get();   
        return response()->json($patient);
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
            'name'=>'required',
            'kp_passport'=>'required|unique:patients',
            'age'=>'required',
            'gender'=>'required',
            'race'=>'',
            'address'=>'',
            'phone'=>'',
            'nationality'=>'required',
            'job'=>'',
            'workplace'=>'',
            'area'=>'required',
            'notes'=>'',

        ]);
        $patient = new Patient;
        $patient->name = $request->name;
        $patient->kp_passport = $request->kp_passport;
        $patient->age = $request->age;
        $patient->gender = $request->gender;
        $patient->race = $request->race;
        $patient->address = $request->address;
        $patient->phone = $request->phone;
        $patient->nationality = $request->job;
        $patient->workplace = $request->workplace;
        $patient->job = $request->nationality;
        $patient->area = $request->area;
        $patient->notes = $request->notes;
        $patient->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = DB::table('patients')->where('id',$id)->first();
        return response()->json($patient);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['kp_passport'] = $request->kp_passport;
        $data['age'] = $request->age;
        $data['gender'] = $request->gender;
        $data['race'] = $request->race;
        $data['address'] = $request->address;
        $data['phone'] = $request->phone;
        $data['nationality'] = $request->nationality;
        $data['job'] = $request->job;
        $data['workplace'] = $request->workplace;
        $data['area'] = $request->area;
        $data['notes'] = $request->notes;
        DB::table('patients')->where('id',$id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('patients')->where('id',$id)->delete();
    }
}
