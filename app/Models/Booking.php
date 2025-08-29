<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'showtime_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'total_price',
        'booking_status',
        'booking_code',
        'payment_method',
        'payment_status',
        'qr_code',
    ];

    protected $casts = [
        'total_price' => 'decimal:2',
    ];

    public function showtime(): BelongsTo
    {
        return $this->belongsTo(Showtime::class);
    }

    public function seats(): BelongsToMany
    {
        return $this->belongsToMany(Seat::class, 'booking_seats')
            ->withPivot('seat_price')
            ->withTimestamps();
    }
}
