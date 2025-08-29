<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MovieController extends Controller
{
    public function index()
    {
        return Movie::query()->latest()->paginate(15);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:200',
            'description' => 'required|string',
            'duration' => 'required|integer|min:1',
            'genre' => 'required|string|max:100',
            'rating' => 'required|string|max:10',
            'director' => 'required|string|max:100',
            'cast' => 'required|string',
            'poster_image' => 'required|string|max:255',
            'trailer_url' => 'nullable|string|max:255',
            'release_date' => 'nullable|date',
            'is_active' => 'boolean',
        ]);

        $movie = Movie::create($data);
        return response()->json($movie, Response::HTTP_CREATED);
    }

    public function show(Movie $movie)
    {
        return $movie;
    }

    public function update(Request $request, Movie $movie)
    {
        $data = $request->validate([
            'title' => 'sometimes|required|string|max:200',
            'description' => 'sometimes|required|string',
            'duration' => 'sometimes|required|integer|min:1',
            'genre' => 'sometimes|required|string|max:100',
            'rating' => 'sometimes|required|string|max:10',
            'director' => 'sometimes|required|string|max:100',
            'cast' => 'sometimes|required|string',
            'poster_image' => 'sometimes|required|string|max:255',
            'trailer_url' => 'nullable|string|max:255',
            'release_date' => 'nullable|date',
            'is_active' => 'boolean',
        ]);

        $movie->update($data);
        return $movie->refresh();
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();
        return response()->noContent();
    }
}
