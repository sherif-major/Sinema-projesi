<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\HallController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\ShowtimeController;
use App\Http\Controllers\BookingController;

Route::apiResources([
    'movies' => MovieController::class,
    'halls' => HallController::class,
    'seats' => SeatController::class,
    'showtimes' => ShowtimeController::class,
    'bookings' => BookingController::class,
]);
