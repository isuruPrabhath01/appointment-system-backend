<?php

namespace App\Services\Utils;

use Illuminate\Http\Request;
use App\Models\Doctor_shift;
use Illuminate\Database\QueryException;


class Utils{
    public function findDoctorShiftIdUsingDoc_idAndDate($doc_id,$date){
        try{
            $doctorShift=Doctor_shift::where('doc_id',$doc_id)->where('date',$date)->get();
            foreach ($doctorShift as $item) {
                $id = $item->id;
            }
            return $id;
        }catch(QueryException $e ){
            return 0;
        }
    }
}