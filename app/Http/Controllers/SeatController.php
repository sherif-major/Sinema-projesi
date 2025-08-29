<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SeatController extends Controller
{
    public function index()
    {
        return Seat::query()->latest()->paginate(15);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'hall_id' => 'required|exists:halls,id',
            'row_number' => 'required|string|max:5',
            'seat_number' => 'required|integer|min:1',
            'seat_type' => 'required|in:standard,vip,accessible',
            'is_active' => 'boolean',
        ]);

        $seat = Seat::create($data);
        return response()->json($seat, Response::HTTP_CREATED);
    }

    public function show(Seat $seat)
    {
        return $seat;
    }

    public function update(Request $request, Seat $seat)
    {
        $data = $request->validate([
            'hall_id' => 'sometimes|required|exists:halls,id',
            'row_number' => 'sometimes|required|string|max:5',
            'seat_number' => 'sometimes|required|integer|min:1',
            'seat_type' => 'sometimes|required|in:standard,vip,accessible',
            'is_active' => 'boolean',
        ]);

        $seat->update($data);
        return $seat->refresh();
    }

    public function destroy(Seat $seat)
    {
        $seat->delete();
        return response()->noContent();
    }
}
