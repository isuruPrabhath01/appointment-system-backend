<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Doctor_shift extends Model
{
    use HasFactory;

    protected $filleble=[
        'doc_id',
        'date',
        ['shift_array']
    ];

    protected $casts = [
        'shift_array' => 'array', 
    ];

    public function doctor(): HasOne
    {
        return $this->hasOne(doctor::class);
    }
}
