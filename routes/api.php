<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('v1/register', [AuthController::class, 'register']);
Route::post('v1/login', [AuthController::class, 'login']);

Route::group(['middleware'=>['auth:sanctum']], function () {
    //Auth 
    Route::post('v1/logout', [AuthController::class, 'logout']);

    //Doctor
    Route::post('v1/doctor', [DoctorController::class, 'store']);
    Route::post('v1/doctor/{id}', [DoctorController::class, 'update']);
    Route::get('v1/doctor', [DoctorController::class, 'index']);
    Route::delete('v1/doctor/{id}', [DoctorController::class, 'destroy']);
});

