<?php

namespace App\Http\Controllers;

use App\Models\Doctor_shift;
use App\Services\DoctorShiftService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Exists;

class DoctorShiftController extends Controller
{
    protected DoctorShiftService $doctorShiftService;

    public function __construct(DoctorShiftService $doctorShiftService)
    {
        $this->doctorShiftService=$doctorShiftService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Doctor_shift::latest()->get(),200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate=Validator::make($request->all(),[
            'doc_id'=>'required',
            'date'=>'required',
            'shift_array'=>'required'
        ]);
        if($validate->fails()){
           return response()->json($validate->messages(),422);
        }else{
            $response = $this->doctorShiftService->addShift($request);
            if($response===0){
                return response()->json('Doctor Allready have a Shift..!!',409);
            }else{
                return response()->json($response,201);
            }
        }   
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $doctorShift = Doctor_shift::find($id);
        return response()->json($doctorShift,200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validate=Validator::make($request->all(),[
            'doc_id'=>'required',
            'date'=>'required',
            'shift_array'=>'required'
        ]);
        if($validate->fails()){
           return response()->json($validate->messages(),422);
        }else{
            $response = $this->doctorShiftService->updateShift($request);
            if($response===0){
                return response()->json('Shift not exists..!!',409);
            }else{
                return response()->json($response,201);
            }
        }   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(Doctor_shift::find($id)->exists()){
            $doctorShift=Doctor_shift::find($id);
            $doctorShift->delete();
            return response()->json('Recode deleted..!!',200);
        }else{
            return response()->json('Invalid Shift Id..!!',409);
        }
    }

    public function getDoctorShiftId($doc_id,$date){
        $response=$this->doctorShiftService->findShiftId($doc_id,$date);
        if($response===0){
            return response()->json('canot find Shift',409);
        }else{
            return response()->json($response,200);
        }
    }
}
