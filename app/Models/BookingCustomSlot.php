<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingCustomSlot extends Model
{
    protected $fillable = ['date', 'slot_time'];
}
