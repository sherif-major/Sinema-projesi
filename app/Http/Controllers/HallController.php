<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HallController extends Controller
{
    public function index()
    {
        return Hall::query()->latest()->paginate(15);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'capacity' => 'required|integer|min:1',
            'row_count' => 'required|integer|min:1',
            'seats_per_row' => 'required|integer|min:1',
            'hall_type' => 'required|in:standard,vip,imax,dolby',
            'screen_type' => 'nullable|string|max:50',
            'sound_system' => 'nullable|string|max:50',
            'is_active' => 'boolean',
        ]);

        $hall = Hall::create($data);
        return response()->json($hall, Response::HTTP_CREATED);
    }

    public function show(Hall $hall)
    {
        return $hall;
    }

    public function update(Request $request, Hall $hall)
    {
        $data = $request->validate([
            'name' => 'sometimes|required|string|max:100',
            'capacity' => 'sometimes|required|integer|min:1',
            'row_count' => 'sometimes|required|integer|min:1',
            'seats_per_row' => 'sometimes|required|integer|min:1',
            'hall_type' => 'sometimes|required|in:standard,vip,imax,dolby',
            'screen_type' => 'nullable|string|max:50',
            'sound_system' => 'nullable|string|max:50',
            'is_active' => 'boolean',
        ]);

        $hall->update($data);
        return $hall->refresh();
    }

    public function destroy(Hall $hall)
    {
        $hall->delete();
        return response()->noContent();
    }
}
