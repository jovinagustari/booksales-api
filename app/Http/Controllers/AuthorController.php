<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    public function index() {
        $authors = Author::all();

        // Check if the authors collection is empty
        if ($authors->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No authors found',
                'data' => []
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Authors retrieved successfully',
            'data' => $authors
        ], 200);
    }

    public function store(Request $request) {
        // Validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'bio' => 'required|string|max:1000',
            'birth_year' => 'required|integer|max:' . date('Y'),
            'nationality' => 'required|string|max:100'
        ]);

        // Check validator errors
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        // Insert data author
        $author = Author::create([
            'name' => $request->input('name'),
            'bio' => $request->input('bio'),
            'birth_year' => $request->input('birth_year'),
            'nationality' => $request->input('nationality')
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Author created successfully',
            'data' => $author
        ], 201);
    }

    public function show(string $id) {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Author not found',
                'data' => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Successfully retrieved author by ID',
            'data' => $author
        ], 200);
    }

    public function update(Request $request, string $id) {
        // Mencari data author
        $author = Author::find($id);
        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Author not found',
                'data' => null
            ], 404);
        }

        // Validator
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'bio' => 'sometimes|required|string|max:1000',
            'birth_year' => 'sometimes|required|integer|max:' . date('Y'),
            'nationality' => 'sometimes|required|string|max:100'
        ]);

        // Check validator errors
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        // Siapkan data untuk diupdate
        $data = [
            'name' => $request->name,
            'bio' => $request->bio,
            'birth_year' => $request->birth_year,
            'nationality' => $request->nationality
        ];

        // Update data author
        $author->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Author updated successfully',
            'data' => $author
        ], 200);
    }

    public function destroy(string $id) {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Author not found',
                'data' => null
            ], 404);
        }

        // if ($author->cover_image) {
        //     // Delete the image from storage
        //     Storage::disk('public')->delete('authors/' . $author->cover_image);
        // }
        
        $author->delete();

        return response()->json([
            'success' => true,
            'message' => 'Author deleted successfully',
            'data' => null
        ], 200);
    }
}
