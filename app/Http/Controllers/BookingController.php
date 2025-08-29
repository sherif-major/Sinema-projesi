<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookingController extends Controller
{
    public function index()
    {
        return Booking::query()->latest()->paginate(15);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'showtime_id' => 'required|exists:showtimes,id',
            'customer_name' => 'required|string|max:100',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'nullable|string|max:20',
            'total_price' => 'required|numeric|min:0',
            'booking_status' => 'required|in:pending,confirmed,cancelled,refunded',
            'booking_code' => 'required|string|max:20|unique:bookings,booking_code',
            'payment_method' => 'nullable|string|max:50',
            'payment_status' => 'required|in:pending,paid,failed,refunded',
            'qr_code' => 'nullable|string|max:255',
        ]);

        $booking = Booking::create($data);
        return response()->json($booking, Response::HTTP_CREATED);
    }

    public function show(Booking $booking)
    {
        return $booking->load(['showtime', 'seats']);
    }

    public function update(Request $request, Booking $booking)
    {
        $data = $request->validate([
            'showtime_id' => 'sometimes|required|exists:showtimes,id',
            'customer_name' => 'sometimes|required|string|max:100',
            'customer_email' => 'sometimes|required|email|max:255',
            'customer_phone' => 'nullable|string|max:20',
            'total_price' => 'sometimes|required|numeric|min:0',
            'booking_status' => 'sometimes|required|in:pending,confirmed,cancelled,refunded',
            'booking_code' => 'sometimes|required|string|max:20|unique:bookings,booking_code,'.$booking->id,
            'payment_method' => 'nullable|string|max:50',
            'payment_status' => 'sometimes|required|in:pending,paid,failed,refunded',
            'qr_code' => 'nullable|string|max:255',
        ]);

        $booking->update($data);
        return $booking->refresh()->load(['showtime', 'seats']);
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return response()->noContent();
    }
}
