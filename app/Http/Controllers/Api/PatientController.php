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
            'id_type'=>'required',
            'kp_passport'=>'required|unique:patients',
            'age'=>'required',
            'gender'=>'required',
            'race'=>'',
            'dob' =>'',
            'address'=>'',
            'phone'=>'',
            'nationality'=>'required',
            'job'=>'',
            'workplace'=>'',
            'area'=>'',
            'notes'=>'',

        ]);
       
        $id_type = $request -> id_type;
        $name =$request->name;
        $nameid =str_replace('/', '', $name);
        $ic_passport = $request ->kp_passport;
        $kp = str_replace("-", "", $ic_passport);
        if($id_type == 0){

            $kp_passport = "NIL"."-".$nameid;
            $patient = new Patient;
            $patient->name = $request->name;
            $patient->id_type = $request->id_type;
            $patient->kp_passport = $kp_passport;
            $patient->age = $request->age;
            $patient->gender = $request->gender;
            $patient->race = $request->race;
            $patient->dob = $request->dob;
            $patient->address = $request->address;
            $patient->phone = $request->phone;
            $patient->nationality = $request->nationality;
            $patient->workplace = $request->workplace;
            $patient->job = $request->job;
            $patient->area = $request->area;
            $patient->notes = $request->notes;
            $patient->save();
            
        } else{
            $patient = new Patient;
            $patient->name = $request->name;
            $patient->id_type = $request->id_type;
            $patient->kp_passport =  $kp;
            $patient->age = $request->age;
            $patient->gender = $request->gender;
            $patient->race = $request->race;
            $patient->dob = $request->dob;
            $patient->address = $request->address;
            $patient->phone = $request->phone;
            $patient->nationality = $request->nationality;
            $patient->workplace = $request->workplace;
            $patient->job = $request->job;
            $patient->area = $request->area;
            $patient->notes = $request->notes;
            $patient->save();
        }
  
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
        $data['id_type'] = $request->kp_passport;
        $data['kp_passport'] = $request->kp_passport;
        $data['age'] = $request->age;
        $data['gender'] = $request->gender;
        $data['race'] = $request->race;
        $data['dob'] = $request->dob;
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
