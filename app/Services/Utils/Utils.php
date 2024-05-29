<?php

namespace App\Services\Utils;

use Illuminate\Http\Request;
use App\Models\Doctor_shift;

class Utils{
    public function findDoctorShiftIdUsingDoc_idAndDate(Request $request){
        $doctorShift=Doctor_shift::where('doc_id',$request->doc_id)->where('date',$request->date)->get();
        foreach ($doctorShift as $item) {
            $id = $item->id;
        }
        return $id;
    }
}