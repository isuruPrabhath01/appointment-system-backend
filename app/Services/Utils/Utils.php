<?php

namespace App\Services\Utils;

use App\Models\Appointment;
use App\Models\Doctor_shift;
use App\Models\Patient;



class Utils{
    public function findDoctorShiftIdUsingDoc_idAndDate($doc_id,$date){
         $doctorShift=Doctor_shift::where('doc_id',$doc_id)->where('date',$date)->get();
         foreach ($doctorShift as $item) {
             $id = $item->id;
         }
         return $id;
    }

    public function findPatientIdUsingPatientEmail($email){
        $patient=Patient::where('email',$email)->get();
        foreach ($patient as $item) {
            $id = $item->id;
        }
        return $id;
    }

    public function storeDateInArry($shiftArray,$request,$doctoreShift){
        if($shiftArray[$request->slot]===0){
            $shiftArray[$request->slot]=$request->patient_id;
            $doctoreShift->shift_array=$shiftArray;
            return $doctoreShift;
        }else{
            return 0;
        }
    }

    public function updatedoctorShiftArray($request,$condition){
        $doctoreShift=Doctor_shift::find($this->findDoctorShiftIdUsingDoc_idAndDate($request->doc_id,$request->appo_date));
        if($doctoreShift){
            $shiftArray=$doctoreShift->shift_array;
            if($condition===0){
                return $this->storeDateInArry($shiftArray,$request,$doctoreShift);
            }else{
                if($shiftArray[$request->old_slot]===$request->patient_id){
                    $doctoreShift=$this->storeDateInArry($shiftArray,$request,$doctoreShift);
                    if($doctoreShift===0){
                        return 0;
                    }else{
                        $shiftArray=$doctoreShift->shift_array;
                        $shiftArray[$request->old_slot]=0;
                        $doctoreShift->shift_array=$shiftArray;
                        return $doctoreShift;
                    }
                }
            }
        }else{
            return 0;
        }
    }
}