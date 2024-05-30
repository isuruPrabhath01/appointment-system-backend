<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model
{
    use HasFactory;

    protected $filleble=[
        'patient_id',
        'doc_id',
        'appo_date',
        'appo_time',
        'note',
        'status'
    ];

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class,'doc_id','id');
    }

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class,'patient_id','id');
    }
}
