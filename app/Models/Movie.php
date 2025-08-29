<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'duration',
        'genre',
        'rating',
        'director',
        'cast',
        'poster_image',
        'trailer_url',
        'release_date',
        'is_active',
    ];

    protected $casts = [
        'release_date' => 'date',
        'is_active' => 'boolean',
    ];

    public function showtimes(): HasMany
    {
        return $this->hasMany(Showtime::class);
    }
}
