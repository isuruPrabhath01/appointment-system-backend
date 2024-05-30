<?php

namespace App\Services;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Services\Utils\Convertor;
use Illuminate\Http\Request;

class AppointmentService{
    protected Convertor $convertor;

    public function __construct(Convertor $convertor)
    {
        $this->convertor=$convertor;
    }

    public function addAppointment(Request $request){
        if(Patient::find($request->patient_id)->exists()&&Doctor::find($request->doc_id)->exists()){
            $appointment=$this->convertor->getApointmentModelForCreate($request);
            $appointment->save();
            return $appointment;
        }
    }

    public function updateAppointment(Request $request,$id)
    {
        if(Appointment::with('patient','doctor')->find($id)->exists()){
            $appointment=Appointment::with('patient','doctor')->find($id);
            $appointment=$this->convertor->getApointmentModelForUpdate($request,$appointment);
            $appointment->save();
            return $appointment;
        }else{
            return 0;
        }
    }
}