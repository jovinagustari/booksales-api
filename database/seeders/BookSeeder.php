<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Genre;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'The Hobbit',
            'year' => 1937,
            'cover_image' => 'path/to/hobbit_cover.jpg',
            'description' => 'A fantasy novel about the adventures of a hobbit named Bilbo Baggins.',
            'price' => 100000,
            'stock' => 50,
            'genre_id' => optional(Genre::where('name', 'Fantasy')->first())->id, // Fantasy
            'author_id' => optional(Author::where('name', 'J.R.R. Tolkien')->first())->id, // J.R.R. Tolkien
        ]);
        Book::create([
            'title' => '1984',
            'year' => 1949,
            'cover_image' => 'path/to/1984_cover.jpg',
            'description' => 'A dystopian novel that explores the dangers of totalitarianism and extreme political ideology.',
            'price' => 120000,
            'stock' => 30,
            'genre_id' => optional(Genre::where('name', 'Dystopian')->first())->id, // Dystopian
            'author_id' => optional(Author::where('name', 'George Orwell')->first())->id, // George Orwell
        ]);
        Book::create([
            'title' => 'To Kill a Mockingbird',
            'year' => 1960,
            'cover_image' => 'path/to/mockingbird_cover.jpg',
            'description' => 'A novel that deals with serious issues like racial inequality and moral growth through the eyes of a child.',
            'price' => 150000,
            'stock' => 20,
            'genre_id' => optional(Genre::where('name', 'Coming-of-age')->first())->id, // Coming-of-age
            'author_id' => optional(Author::where('name', 'Harper Lee')->first())->id, // Harper Lee
        ]);
        Book::create([
            'title' => 'The Great Gatsby',
            'year' => 1925,
            'cover_image' => 'path/to/gatsby_cover.jpg',
            'description' => 'A critique of the American Dream, set in the Jazz Age, focusing on themes of wealth, love, and social change.',
            'price' => 130000,
            'stock' => 25,
            'genre_id' => optional(Genre::where('name', 'Classic')->first())->id, // Classic
            'author_id' => optional(Author::where('name', 'F. Scott Fitzgerald')->first())->id, // F. Scott Fitzgerald
        ]);
        Book::create([
            'title' => 'Jane Eyre',
            'year' => 1847,
            'cover_image' => 'path/to/jane_eyre_cover.jpg',
            'description' => 'A novel that follows the life of an orphaned girl named Jane Eyre as she overcomes hardships to find love and independence.',
            'price' => 120000,
            'stock' => 30,
            'genre_id' => optional(Genre::where('name', 'Romance')->first())->id, // Romance
            'author_id' => optional(Author::where('name', 'Charlotte Brontë')->first())->id, // Charlotte Brontë
        ]);
        Book::create([
            'title' => 'The Martian',
            'year' => 2011,
            'cover_image' => 'path/to/martian_cover.jpg',
            'description' => 'A science fiction novel about an astronaut stranded on Mars and his struggle to survive.',
            'price' => 110000,
            'stock' => 40,
            'genre_id' => optional(Genre::where('name', 'Science Fiction')->first())->id, // Science Fiction
            'author_id' => optional(Author::where('name', 'Andy Weir')->first())->id, // Andy Weir
        ]);
        Book::create([
            'title' => 'Fahrenheit 451',
            'year' => 1953,
            'cover_image' => 'path/to/fahrenheit_cover.jpg',
            'description' => 'A dystopian novel that presents a future where books are banned and "firemen" burn any that are found.',
            'price' => 160000,
            'stock' => 10,
            'genre_id' => optional(Genre::where('name', 'Dystopian')->first())->id, // Dystopian
            'author_id' => optional(Author::where('name', 'George Orwell')->first())->id, // George Orwell
        ]);
        Book::create([
            'title' => 'Pride and Prejudice',
            'year' => 1813,
            'cover_image' => 'path/to/pride_prejudice_cover.jpg',
            'description' => 'A romantic novel that critiques the British landed gentry at the end of the 18th century.',
            'price' => 170000,
            'stock' => 35,
            'genre_id' => optional(Genre::where('name', 'Romance')->first())->id, // Romance
            'author_id' => optional(Author::where('name', 'Jane Austen')->first())->id, // Jane Austen
        ]);
        Book::create([
            'title' => 'The Alchemist',
            'year' => 1988,
            'cover_image' => 'path/to/alchemist_cover.jpg',
            'description' => 'A philosophical novel that follows a shepherd named Santiago on his journey to discover his personal legend.',
            'price' => 180000,
            'stock' => 45,
            'genre_id' => optional(Genre::where('name', 'Adventure')->first())->id, // Adventure
            'author_id' => optional(Author::where('name', 'Paulo Coelho')->first())->id, // Paulo Coelho
        ]);
        Book::create([
            'title' => 'A Brief History of Time',
            'year' => 1988,
            'cover_image' => 'path/to/brief_history_cover.jpg',
            'description' => 'A popular-science book that explains complex concepts of cosmology in an accessible way.',
            'price' => 190000,
            'stock' => 20,
            'genre_id' => optional(Genre::where('name', 'Science')->first())->id, // Science
            'author_id' => optional(Author::where('name', 'Stephen Hawking')->first())->id, // Stephen Hawking
        ]);
        Book::create([
            'title' => 'Harry Potter and the Sorcerer\'s Stone',
            'year' => 1997,
            'cover_image' => 'path/to/harry_potter_cover.jpg',
            'description' => 'A young boy discovers he is a wizard on his 11th birthday and attends a magical school.',
            'price' => 250000,
            'stock' => 100,
            'genre_id' => optional(Genre::where('name', 'Fantasy')->first())->id, // Fantasy
            'author_id' => optional(Author::where('name', 'J.K. Rowling')->first())->id, // J.K. Rowling
        ]);
        Book::create([
            'title' => 'Harry Potter and the Chamber of Secrets',
            'year' => 1998,
            'cover_image' => 'path/to/harry_potter_chamber_cover.jpg',
            'description' => 'The second book in the Harry Potter series, where Harry returns to Hogwarts and faces new challenges.',
            'price' => 260000,
            'stock' => 90,
            'genre_id' => optional(Genre::where('name', 'Fantasy')->first())->id, // Fantasy
            'author_id' => optional(Author::where('name', 'J.K. Rowling')->first())->id, // J.K. Rowling
        ]);
        Book::create([
            'title' => 'The Lord of the Rings: The Fellowship of the Ring',
            'year' => 1954,
            'cover_image' => 'path/to/lotr_fellowship_cover.jpg',
            'description' => 'The first part of J.R.R. Tolkien\'s epic fantasy trilogy, following Frodo Baggins on his quest to destroy the One Ring.',
            'price' => 220000,
            'stock' => 50,
            'genre_id' => optional(Genre::where('name', 'Fantasy')->first())->id, // Fantasy
            'author_id' => optional(Author::where('name', 'J.R.R. Tolkien')->first())->id, // J.R.R. Tolkien
        ]);
    }
}
