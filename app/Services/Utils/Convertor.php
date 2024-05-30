<?php

namespace App\Services\Utils;

use App\Models\Doctor;
use App\Models\Doctor_shift;
use Illuminate\Http\Client\Request as ClientRequest;
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
    public function doctor_shift_req_convert_to_model(Request $request):Doctor_shift{
        $doctorShift = new Doctor_shift();
        $doctorShift->doc_id =Doctor::find($request->doc_id)->id;
        $doctorShift->date = $request->date;
        $doctorShift->shift_array = $request->shift_array;

        return $doctorShift;
    }
    public function doctor_shift_find_convert_to_model(Request $request, $doctorShift){
        $doctorShift->doc_id = Doctor::find($request->doc_id)->id;
        $doctorShift->date = $request->date;
        $doctorShift->shift_array = $request->shift_array;
        return $doctorShift;
    }
}
