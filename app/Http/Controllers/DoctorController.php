<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Services\DoctorService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class DoctorController extends Controller
{

    protected DoctorService $doctorService;
    public function __construct(DoctorService $doctorService)
    {
        $this->doctorService=$doctorService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Doctor::latest()->get(),200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate=Validator::make($request->all(),[
            'doc_name'=>'required',
            'mbbs_id'=>'required|unique:doctors',
            'specialization'=>'required',
            'experience'=>'required',
            'phone_number'=>'required'
        ]);
        if($validate->fails()){
            return response()->json([
                'errors' => $validate->messages()
            ],422);
        }else{
            return response()->json($this->doctorService->addDoctore($request),201);
        }     

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, string $id)
    {
        $validate=Validator::make($request->all(),[
            'doc_name'=>'required',
            'mbbs_id'=>'required',
            'specialization'=>'required',
            'experience'=>'required',
            'phone_number'=>'required'
        ]);
        if($validate->fails()){
            return response()->json([
                'errors'=>$validate->messages()
            ],422);
        }else{
            return response()->json($this->doctorService->updateDoctore($request,$id),201);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $doctor=Doctor::find($id);
        $doctor->delete();
        return response()->json('Recode deleted..!!',200);
    }
}
