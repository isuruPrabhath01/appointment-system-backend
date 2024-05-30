<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Services\PatientService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PatientController extends Controller
{
    protected PatientService $patientService;

    public function __construct(PatientService $patientService)
    {
        $this->patientService=$patientService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Patient::latest()->get(),200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'patient_name'=>'required',
            'dob'=>'required',
            'gender'=>'required',
            'address'=>'required',
            'email'=>'required|unique:patients',
            'desc'=>'required',
            'medical_history'=>'required',
            'emergency_contact_name'=>'required',
            'emergency_contact_number'=>'required',
        ]);

        if($validate->fails()){
            return response()->json(
                $validate->messages(),422
            );
        }else{
            return response()->json($this->patientService->addPatient($request),201);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $email)
    {
        $response = $this->patientService->findPetientId($email);
        if($response===0){
            return response()->json('Invalid Email',409);
        }else{
            return response()->json(Patient::find($response),200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'patient_name'=>'required',
            'dob'=>'required',
            'gender'=>'required',
            'address'=>'required',
            'email'=>'required',
            'desc'=>'required',
            'medical_history'=>'required',
            'emergency_contact_name'=>'required',
            'emergency_contact_number'=>'required',
        ]);
        if($validate->fails()){
            return response()->json(
                $validate->messages(),422
            );
        }else{
            $response = $this->patientService->updatePatient($request);
            if($response===0){
                return response()->json('Invalid Email..!!',409);
            }else{
                return response()->json($response,201);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $email)
    {
        $response = $this->patientService->findPetientId($email);
        if($response===0){
            return response()->json('Invalid Email',409);
        }else{
            Patient::find($response)->delete();
            return response()->json($email.' Patient Deleted..!!',200);
        }
    }
}
