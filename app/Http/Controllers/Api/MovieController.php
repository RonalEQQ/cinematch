<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function index()
    {
        return response()->json(Movie::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'genre' => 'required|string|max:100',
        ]);

        $movie = Movie::create($validated);

        return response()->json($movie, 201);
    }

    public function show(string $id)
    {
        $movie = Movie::find($id);

        if (!$movie) {
            return response()->json([
                'message' => 'Película no encontrada'
            ], 404);
        }

        return response()->json($movie);
    }

    public function update(Request $request, string $id)
    {
        $movie = Movie::find($id);

        if (!$movie) {
            return response()->json([
                'message' => 'Película no encontrada'
            ], 404);
        }

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'year' => 'sometimes|required|integer|min:1900|max:' . date('Y'),
            'genre' => 'sometimes|required|string|max:100',
        ]);

        $movie->update($validated);

        return response()->json($movie);
    }

    public function destroy(string $id)
    {
        $movie = Movie::find($id);

        if (!$movie) {
            return response()->json([
                'message' => 'Película no encontrada'
            ], 404);
        }

        $movie->delete();

        return response()->json([
            'message' => 'Película eliminada correctamente'
        ]);
    }
}
