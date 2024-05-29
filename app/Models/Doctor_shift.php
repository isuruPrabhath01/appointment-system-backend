<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Doctor_shift extends Model
{
    use HasFactory;

    protected $filleble=[
        'doc_id',
        'date',
        'slot_1',
        'slot_2',
        'slot_3',
        'slot_4',
        'slot_5',
        'slot_6',
        'slot_7',
        'slot_8',
        'slot_9',
        'slot_10',
        'slot_11',
        'slot_12',
        'slot_13',
        'slot_14',
        'slot_15',
        'slot_16',
        'slot_17',
        'slot_18',
        'slot_19',
        'slot_20',
        'slot_21',
        'slot_22',
        'slot_23',
        'slot_24',
        'slot_25',
        'slot_26',
        'slot_27'
    ];

    public function phone(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }
}
