<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use App\Models\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index() {
        $bookModel = new Book();
        $genreModel = new Genre();
        $authorModel = new Author();

        $books = $bookModel->getBooks();
        $genres = $genreModel->getGenres();
        $authors = $authorModel->getAuthors();

        return view('books.index', compact('books', 'genres', 'authors'));
    }
}
