<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'service_type',
        'message',
        'booking_date',
        'booking_time',
        'status',
        'notes',
    ];

    protected $casts = [
        'booking_date' => 'date',
    ];

    // Status constants
    const STATUS_PENDING = 'pending';
    const STATUS_CONFIRMED = 'confirmed';
    const STATUS_CANCELLED = 'cancelled';
    const STATUS_COMPLETED = 'completed';

    public function getServiceTypeLabel(): string
    {
        $services = [
            'va' => 'Virtual Assistants',
            'smm' => 'Social Media Managers',
            'writer' => 'Writers & Copywriters',
            'mktg' => 'Digital Marketers & Designers',
            'dev' => 'Developers & Engineers',
        ];

        return $services[$this->service_type] ?? $this->service_type;
    }
}
