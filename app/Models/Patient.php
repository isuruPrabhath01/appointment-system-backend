<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $filleble=[
        'patient_name',
        'dob',
        'gender',
        'address',
        'email',
        'desc',
        'medical_history',
        'emergency_contact_name',
        'emergancy_contact_number',
    ];
}
