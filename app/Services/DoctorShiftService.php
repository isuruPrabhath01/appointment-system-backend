<?php

namespace App\Services;

use App\Models\Doctor_shift;
use Illuminate\Http\Request;
use App\Services\Utils\Convertor;
use App\Services\Utils\Utils;

use function PHPUnit\Framework\isNull;

class DoctorShiftService{
    public Convertor $convertor;
    public Utils $utils;
    public function __construct(Convertor $convertor,Utils $utils)
    {
        $this->convertor=$convertor;
        $this->utils=$utils;
    }
    public function addShift(Request $request){
        if(Doctor_shift::where('doc_id',$request->doc_id)->where('date',$request->date)->exists()){
            return 0;
        }else{
            $doctorShift =$this->convertor->doctor_shift_req_convert_to_model($request);
            $doctorShift->save();
            return $doctorShift;
        }
    }

    public function updateShift(Request $request){
        if(!Doctor_shift::where('doc_id',$request->doc_id)->where('date',$request->date)->exists()){
            return 0;
        }else{
            $doctorShift = $this->convertor->doctor_shift_find_convert_to_model($request,Doctor_shift::find($this->utils->findDoctorShiftIdUsingDoc_idAndDate($request)));
            $doctorShift->save();
            return $doctorShift;
        }
    }
}