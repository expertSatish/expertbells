<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlotAvailabilityDate extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_time',
        'to_time',
        'date',
        'expert_id',
        'day'
        // Other fillable attributes...
    ];
}
