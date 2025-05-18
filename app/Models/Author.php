<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    private $Authors = [
        1 => 'F. Scott Fitzgerald',
        2 => 'Harper Lee',
        3 => 'George Orwell',
        4 => 'Andy Weir',
        5 => 'Stephen Hawking',
        6 => 'Yuval Noah Harari',
        7 => 'J.K. Rowling',
        8 => 'J.R.R. Tolkien',
    ];

    public function getAuthors()
    {
        return $this->Authors;
    }
}
