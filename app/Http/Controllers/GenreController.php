<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    public function index() {
        $genres = Genre::all();

        // Check if the genres collection is empty
        if ($genres->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No genres found',
                'data' => []
            ], 404);
        }
        
        return response()->json([
            'success' => true,
            'message' => 'Genres retrieved successfully',
            'data' => $genres
        ], 200);
    }

    public function store(Request $request) {
        // Validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000'
        ]);

        // Check validator errors
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        // Insert data genre
        $genre = Genre::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        // Response
        return response()->json([
            'success' => true,
            'message' => 'Genre created successfully',
            'data' => $genre
        ], 201);
    }
}
