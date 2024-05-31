<?php

namespace App\Services;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Doctor_shift;
use App\Models\Patient;
use App\Services\Utils\Convertor;
use App\Services\Utils\Utils;
use Illuminate\Http\Request;

class AppointmentService{
    protected Convertor $convertor;
    protected Utils $utils;
    protected DoctorShiftService $doctorShiftService;

    public function __construct(Convertor $convertor,Utils $utils,DoctorShiftService $doctorShiftService)
    {
        $this->convertor=$convertor;
        $this->utils=$utils;
        $this->doctorShiftService=$doctorShiftService;
    }

    public function addAppointment(Request $request){
        if(Patient::find($request->patient_id)
            &&Doctor::find($request->doc_id))
        {
            $doctorShift=$this->utils->updatedoctorShiftArray($request,0);
            if($doctorShift){
                $doctorShift->save();
                $appointment=$this->convertor->getApointmentModelForCreate($request);
                $appointment->save();
                return $appointment;
            }else{
                return 0;
            }
        }else{
            
            return 0;
        }
    }

    public function updateAppointment(Request $request,$id)
    {
        $appointment=Appointment::with('patient','doctor')->find($id);
        if($appointment){
            $doctorShift=$this->utils->updatedoctorShiftArray($request,1);
            if($doctorShift){
                $doctorShift->save();
                $appointment=$this->convertor->getApointmentModelForUpdate($request,$appointment);
                $appointment->save();
                return 1;
            }else{
                return 0; 
            }
        }else{
            return 0;
        }
    }
}