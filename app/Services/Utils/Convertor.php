<?php

namespace App\Services\Utils;

use App\Models\Doctor;
use Illuminate\Http\Request;


class Convertor{
    public function doctor_req_convert_to_model(Request $request):Doctor{
        $doctor = new Doctor();
        $doctor->doc_name=$request->doc_name;
        $doctor->mbbs_id=$request->mbbs_id;
        $doctor->specialization=$request->specialization;
        $doctor->experience=$request->experience;
        $doctor->phone_number=$request->phone_number;
        return $doctor;
    }
    public function doctor_find_convert_to_model(Request $request,Doctor $doctor):Doctor{
        $doctor->doc_name=$request->doc_name;
        $doctor->mbbs_id=$request->mbbs_id;
        $doctor->specialization=$request->specialization;
        $doctor->experience=$request->experience;
        $doctor->phone_number=$request->phone_number;
        return $doctor;
    }
}
