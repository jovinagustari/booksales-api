<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function index() {
        $books = Book::all();
        $genres = Genre::all();
        $authors = Author::all();

        // Check if the books collection is empty
        if ($books->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No books found',
                'data' => []
            ], 404);
        }
        // Check if the genres collection is empty
        if ($genres->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No genres found',
                'data' => []
            ], 404);
        }
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
        'message' => 'Books retrieved successfully',
        'data' => $authors,
        'data' => $genres,
        'data' => $books
       ], 200);
    }

    public function store(Request $request) {
        // Validator
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'year' => 'required|integer|max:' . date('Y'),
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required|string|max:1000',
            'price' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0',
            'genre_id' => 'required|exists:genres,id',
            'author_id' => 'required|exists:authors,id'
        ]);

        // Check validator errors
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        // Upload image (for books)
        $image = $request->file('cover_image');
        $image->store('books', 'public');

        // Insert data book
        $book = Book::create([
            'title' => $request->input('title'),
            'year' => $request->input('year'),
            'cover_image' => $image->hashName(),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
            'genre_id' => $request->input('genre_id'),
            'author_id' => $request->input('author_id')
        ]);

        // Response
        return response()->json([
            'success' => true,
            'message' => 'Book created successfully',
            'data' => $book
        ], 201);
    }

    public function show(string $id) {
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                'success' => false,
                'message' => 'Book not found',
                'data' => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Successfully retrieved book by id',
            'data' => $book
        ], 200);
    }

    public function update(Request $request, string $id) {
        // Mencari data book
        $book = Book::find($id);
        if (!$book) {
            return response()->json([
                'success' => false,
                'message' => 'Book not found',
                'data' => null
            ], 404);
        }

        // Validator
        $validator = Validator::make($request->all(), [
            'title' => 'sometimes|required|string|max:255',
            'year' => 'sometimes|required|integer|max:' . date('Y'),
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'sometimes|required|string|max:1000',
            'price' => 'sometimes|required|integer|min:0',
            'stock' => 'sometimes|required|integer|min:0',
            'genre_id' => 'sometimes|required|exists:genres,id',
            'author_id' => 'sometimes|required|exists:authors,id'
        ]);

        // Check validator errors
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        // Siapkan data untuk update
        $data = [
            'title' => $request->title,
            'year' => $request->year,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'genre_id' => $request->genre_id,
            'author_id' => $request->author_id
        ];
    
        // Handle image (update and delete)
        if ($request->hasFile('cover_image')) {
            // Store the new image
            $image = $request->file('cover_image');
            $image->store('books', 'public');

            // Delete the old image if it exists
            if ($book->getOriginal('cover_image')) {
                Storage::disk('public')->delete('books/' . $book->getOriginal('cover_image'));
            }
            $data['cover_image'] = $image->hashName();
        }

        // Update book data
        $book->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Book updated successfully',
            'data' => $book
        ], 200);
    }

    public function destroy(string $id) {
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                'success' => false,
                'message' => 'Book not found',
                'data' => null
            ], 404);
        }

        if ($book->cover_image) {
            // Delete the image from storage
            Storage::disk('public')->delete('books/' . $book->cover_image);
        }
        $book->delete();

        return response()->json([
            'success' => true,
            'message' => 'Book deleted successfully',
            'data' => null
        ], 200);
    }
}
