<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    private $Books = [
        [
            'id' => 1,
            'title' => 'The Great Gatsby',
            'year' => 1925,
            'cover_image' => 'https://example.com/gatsby.jpg',
            'description' => 'A novel set in the Roaring Twenties that tells the story of Jay Gatsby and his unrequited love for Daisy Buchanan.',
            'price' => 180000,
            'stock' => 70,
            'genre_id' => 1,
            'author_id' => 1,
        ],
        [
            'id' => 2,
            'title' => 'To Kill a Mockingbird',
            'year' => 1960,
            'cover_image' => 'https://example.com/mockingbird.jpg',
            'description' => 'A novel about the serious issues of race and injustice in the Deep South.',
            'price' => 205000,
            'stock' => 50,
            'genre_id' => 1,
            'author_id' => 2,
        ], 
        [
            'id' => 3,
            'title' => '1984',
            'year' => 1949,
            'cover_image' => 'https://example.com/1984.jpg',
            'description' => 'A dystopian novel that explores the dangers of totalitarianism and extreme political ideology.',
            'price' => 235000,
            'stock' => 75,
            'genre_id' => 2,
            'author_id' => 3,
        ],
        [
            'id' => 4,
            'title' => 'The Martian',
            'year' => 2011,
            'cover_image' => 'https://example.com/themartian.jpg',
            'description' => 'A stranded astronaut struggles to survive on Mars using his ingenuity and engineering skills.',
            'price' => 150000,
            'stock' => 50,
            'genre_id' => 3, 
            'author_id' => 4,
        ],
        [
            'id' => 5,
            'title' => 'A Brief History of Time',
            'year' => 1988,
            'cover_image' => 'https://example.com/briefhistoryoftime.jpg',
            'description' => 'Stephen Hawking explains complex concepts of cosmology in an accessible way.',
            'price' => 200000,
            'stock' => 30,
            'genre_id' => 4,  // Non-Fiction (assumed)
            'author_id' => 5,
        ],
        [
            'id' => 6,
            'title' => 'Sapiens: A Brief History of Humankind',
            'year' => 2011,
            'cover_image' => 'https://example.com/sapiens.jpg',
            'description' => 'An exploration of the history and impact of Homo sapiens on the world.',
            'price' => 180000,
            'stock' => 40,
            'genre_id' => 5,  // History (assumed)
            'author_id' => 6,
        ],
        [
            'id' => 7,
            'title' => 'Harry Potter and the Sorcerer\'s Stone',
            'year' => 1997,
            'cover_image' => 'https://example.com/harrypotter1.jpg',
            'description' => 'A young boy discovers he is a wizard and attends Hogwarts School of Witchcraft and Wizardry.',
            'price' => 160000,
            'stock' => 60,
            'genre_id' => 1,  // Fiction
            'author_id' => 7,
        ],
        [
            'id' => 8,
            'title' => 'The Lord of the Rings: The Fellowship of the Ring',
            'year' => 1954,
            'cover_image' => 'https://example.com/lotr1.jpg',
            'description' => 'A hobbit sets out on a perilous journey to destroy a powerful ring sought by dark forces.',
            'price' => 220000,
            'stock' => 35,
            'genre_id' => 1,  // Fiction
            'author_id' => 8,
        ],
        [
            'id' => 9,
            'title' => 'Harry Potter and the Chamber of Secrets',
            'year' => 1998,
            'cover_image' => 'https://example.com/harrypotter2.jpg',
            'description' => 'Harry returns to Hogwarts for his second year, where he faces new challenges and mysteries.',
            'price' => 170000,
            'stock' => 55,
            'genre_id' => 1,  // Fiction
            'author_id' => 7,
        ],
    ];

    public function getBooks()
    {
        return $this->Books;
    }
}
