<?php

namespace App\Http\Controllers;

use App\Models\Showtime;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ShowtimeController extends Controller
{
    public function index()
    {
        return Showtime::query()->latest()->paginate(15);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'movie_id' => 'required|exists:movies,id',
            'hall_id' => 'required|exists:halls,id',
            'show_date' => 'required|date',
            'show_time' => 'required',
            'base_price' => 'required|numeric|min:0',
            'vip_price' => 'nullable|numeric|min:0',
            'available_seats' => 'required|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $showtime = Showtime::create($data);
        return response()->json($showtime, Response::HTTP_CREATED);
    }

    public function show(Showtime $showtime)
    {
        return $showtime;
    }

    public function update(Request $request, Showtime $showtime)
    {
        $data = $request->validate([
            'movie_id' => 'sometimes|required|exists:movies,id',
            'hall_id' => 'sometimes|required|exists:halls,id',
            'show_date' => 'sometimes|required|date',
            'show_time' => 'sometimes|required',
            'base_price' => 'sometimes|required|numeric|min:0',
            'vip_price' => 'nullable|numeric|min:0',
            'available_seats' => 'sometimes|required|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $showtime->update($data);
        return $showtime->refresh();
    }

    public function destroy(Showtime $showtime)
    {
        $showtime->delete();
        return response()->noContent();
    }
}
