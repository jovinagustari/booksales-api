<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    private $Genres = [
        1 => 'Fiction',
        2 => 'Dystopian',
        3 => 'Science Fiction',
        4 => 'Non-Fiction',
        5 => 'History',
    ];

    public function getGenres()
    {
        return $this->Genres;
    }
}
