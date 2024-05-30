<?php

namespace App\Services\Utils;


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

}