<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Services\AppointmentService;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    protected AppointmentService $appointmentService;
    public function __construct(AppointmentService $appointmentService)
    {
        $this->appointmentService=$appointmentService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Appointment::with('doctor','patient')->latest()->get(),200);
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
        //dd($request);
        $validate=Validator::make($request->all(),[
            'patient_id'=>'required',
            'doc_id'=>'required',
            'appo_date'=>'required',
            'appo_time'=>'required',
            'note'=>'required',
            'status'=>'required',
            'slot'=>'required'
        ]);
        if($validate->fails()){
            return response()->json($validate->messages(),422);
        }else{
            $response=$this->appointmentService->addAppointment($request);
            if($response===0){
                return response()->json('Bad Inputs..!!',409);
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
        return response()->json( Appointment::find($id),200);
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
            'patient_id'=>'required',
            'doc_id'=>'required',
            'appo_date'=>'required',
            'appo_time'=>'required',
            'note'=>'required',
            'status'=>'required'
        ]);
        if($validate->fails()){
            return response()->json($validate->messages(),422);
        }
        $response=$this->appointmentService->updateAppointment($request,$id);
        if($response==0){
            return response()->json('Invalid Id..!!',409);
        }else{
            return response()->json(true,201);
        }
        
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $appointment=Appointment::find($id);
        $appointment->delete();
        return response()->json($id.' Appointment deleted..!!',200);
    }
}
