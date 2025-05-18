<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::create([ //1
            'name' => 'J.R.R. Tolkien',
            'bio' => 'English writer, best known for The Hobbit and The Lord of the Rings.',
            'birth_year' => 1892,
            'nationality' => 'British',
        ]);
        Author::create([ //2
            'name' => 'C.S. Lewis',
            'bio' => 'British writer and lay theologian, known for The Chronicles of Narnia.',
            'birth_year' => 1898,
            'nationality' => 'British',
        ]);
        Author::create([ //3
            'name' => 'J.K. Rowling',
            'bio' => 'British author, best known for the Harry Potter series.',
            'birth_year' => 1965,
            'nationality' => 'British',
        ]);
        Author::create([ //4
            'name' => 'George R.R. Martin',
            'bio' => 'American novelist and short story writer, known for A Song of Ice and Fire series.',
            'birth_year' => 1948,
            'nationality' => 'American',
        ]);
        Author::create([ //5
            'name' => 'F. Scott Fitzgerald',
            'bio' => 'American novelist and short story writer, known for The Great Gatsby.',
            'birth_year' => 1896,
            'nationality' => 'American',
        ]);
        Author::create([ //6
            'name' => 'Harper Lee',
            'bio' => 'American novelist, best known for To Kill a Mockingbird.',
            'birth_year' => 1926,
            'nationality' => 'American',
        ]);
        Author::create([ //7
            'name' => 'George Orwell',
            'bio' => 'English novelist and essayist, known for 1984 and Animal Farm.',
            'birth_year' => 1903,
            'nationality' => 'British',
        ]);
        Author::create([ //8
            'name' => 'Andy Weir',
            'bio' => 'American novelist and software engineer, known for The Martian.',
            'birth_year' => 1972,
            'nationality' => 'American',
        ]);
        Author::create([ //9
            'name' => 'Stephen Hawking',
            'bio' => 'Theoretical physicist, cosmologist, and author, known for A Brief History of Time.',
            'birth_year' => 1942,
            'nationality' => 'British',
        ]);
        Author::create([ //10
            'name' => 'Suzanne Collins',
            'bio' => 'American television writer and author, known for The Hunger Games series.',
            'birth_year' => 1962,
            'nationality' => 'American',
        ]);
        Author::create([ //11
            'name' => 'Charlotte Brontë',
            'bio' => 'English novelist and poet, best known for her novel Jane Eyre.',
            'birth_year' => 1816,
            'nationality' => 'British',
        ]);
        Author::create([ //12
            'name' => 'Jane Austen',
            'bio' => 'English novelist known for her six major novels including Pride and Prejudice.',
            'birth_year' => 1775,
            'nationality' => 'British',
        ]);
        Author::create([ //13
            'name' => 'Paulo Coelho',
            'bio' => 'Brazilian lyricist and novelist, best known for The Alchemist.',
            'birth_year' => 1947,
            'nationality' => 'Brazilian',
        ]);
    }
}
