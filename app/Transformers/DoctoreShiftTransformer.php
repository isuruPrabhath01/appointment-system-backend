<?php

namespace App\Transformers;

use App\Models\Doctor_shift;
use League\Fractal\TransformerAbstract;

class DoctorShiftTransformer{
    public function transformer(Doctor_shift $doctorShift):array{
        return [
            'id'=>$doctorShift->id,
            'doc_id'=>[
                'id'=>$doctorShift->doctor->id,
                'doc_name'=>$doctorShift->doctor->doc_name,
                'mbbs_id'=>$doctorShift->doctor->mbbs_id,
                'specialization'=>$doctorShift->doctor->specialization,
                'experience'=>$doctorShift->doctor->experience,
                'phone_number'=>$doctorShift->doctor->phone_number,
                ],
            'date'=>$doctorShift->date,
            'shift_array'=>$doctorShift->shift_array
        ];
    }
}
