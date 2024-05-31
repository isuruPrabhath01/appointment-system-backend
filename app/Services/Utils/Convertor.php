<?php

namespace App\Services\Utils;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Doctor_shift;
use App\Models\Patient;
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

    public function getPatientModelForCreate(Request $request):Patient{
        $patient=new Patient();
        $patient->patient_name=$request->patient_name;
        $patient->dob=$request->dob;
        $patient->gender=$request->gender;
        $patient->address=$request->address;
        $patient->email=$request->email;
        $patient->desc=$request->desc;
        $patient->medical_history=$request->medical_history;
        $patient->emergency_contact_name=$request->emergency_contact_name;
        $patient->emergancy_contact_number=$request->emergency_contact_number;
        return $patient;
    }
    public function getPatientModelForUpdate(Request $request,Patient $patient):Patient{
        $patient->patient_name=$request->patient_name;
        $patient->dob=$request->dob;
        $patient->gender=$request->gender;
        $patient->address=$request->address;
        $patient->email=$request->email;
        $patient->desc=$request->desc;
        $patient->medical_history=$request->medical_history;
        $patient->emergency_contact_name=$request->emergency_contact_name;
        $patient->emergancy_contact_number=$request->emergency_contact_number;
        return $patient;
    }

    public function getApointmentModelForCreate(Request $request):Appointment{
        $appointment=new Appointment();
        $appointment->patient_id=$request->patient_id;
        $appointment->doc_id =$request->doc_id ;
        $appointment->appo_date =$request->appo_date ;
        $appointment->appo_time =$request->appo_time ;
        $appointment->note =$request->note ;
        $appointment->status =$request->status ;
        return $appointment;
    }
    public function getApointmentModelForUpdate(Request $request,Appointment $appointment):Appointment{
        $appointment->patient_id=$request->patient_id;
        $appointment->doc_id=$request->doc_id;
        $appointment->appo_date=$request->appo_date;
        $appointment->appo_time=$request->appo_time;
        $appointment->note=$request->note;
        $appointment->status=$request->status;
        return $appointment;
    }
}

