<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use App\Models\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index() {
        $books = Book::all();
        $genres = Genre::all();
        $authors = Author::all();

        return view('books.index', compact('books', 'genres', 'authors'));
    }
}
