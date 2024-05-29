<?php

namespace App\Services;

use App\Models\Doctor;
use App\Services\Utils\Convertor;
use Illuminate\Http\Request;

class DoctorService{
    public Convertor $convertor;
    public function __construct(Convertor $convertor)
    {
        $this->convertor=$convertor;
    }
    public function addDoctore(Request $request):Doctor{
        $doctor=$this->convertor->doctor_req_convert_to_model($request);
        $doctor->save();
        return $doctor;
    }
    public function updateDoctore(Request $request,$id):Doctor{
        $doctor = $this->convertor->doctor_find_convert_to_model($request,Doctor::find($id));
        $doctor->save();
        return $doctor;
    }
}