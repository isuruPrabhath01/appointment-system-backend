<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $filleble=[
        'doc_name',
        'mbbs_id',
        'specialization',
        'experience',
        'phone_number'
    ];

    public function doctor_shift()
    {
        return $this->hasMany(Doctor_shift::class);
    }
}