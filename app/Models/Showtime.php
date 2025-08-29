<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Showtime extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie_id',
        'hall_id',
        'show_date',
        'show_time',
        'base_price',
        'vip_price',
        'available_seats',
        'is_active',
    ];

    protected $casts = [
        'show_date' => 'date',
        'show_time' => 'string',
        'base_price' => 'decimal:2',
        'vip_price' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }

    public function hall(): BelongsTo
    {
        return $this->belongsTo(Hall::class);
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}
