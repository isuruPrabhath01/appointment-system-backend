<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AppointmentNotificationEmail;

class EmailController extends Controller
{
    public function sendAppointmentEmail(){
        $toEmail = 'jeewaa99@gmail.com';
        $message='Appointment System';
        $subject='test Email from laravel';

        Mail::to($toEmail)->send(new AppointmentNotificationEmail($message,$subject));
    }
}
