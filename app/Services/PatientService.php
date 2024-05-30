<?php

namespace App\Services;

use App\Models\Patient;
use App\Services\Utils\Convertor;
use App\Services\Utils\Utils;
use Illuminate\Http\Request;

class PatientService{
    protected Convertor $convertor;
    protected Utils $utils;

    public function __construct(Convertor $convertor,Utils $utils)
    {
        $this->convertor=$convertor;
        $this->utils=$utils;
    }

    public function addPatient(Request $request){
        $response = $this->convertor->getPatientModelForCreate($request)->save();
        return $response;
    }

    public function updatePatient(Request $request){
        if(Patient::where('email',$request->email)->exists()){
            $response = $this->convertor->getPatientModelForUpdate($request,Patient::find($this->utils->findPatientIdUsingPatientEmail($request->email)))->save();
            return $response;
        }else{
            return 0;
        }
    }
    
    public function findPetientId($email){
        if(Patient::where('email',$email)->exists()){
            return $this->utils->findPatientIdUsingPatientEmail($email);
        }else{
            return 0;
        }
    }
}