<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fiction
        Genre::create([ //1
            'name' => 'Science Fiction',
            'description' => 'Explores futuristic concepts, advanced technology, space exploration, and often includes elements of time travel.',
        ]);
        Genre::create([ //2
            'name' => 'Dystopian',
            'description' => 'Set in a society characterized by oppression, totalitarianism, or environmental disaster, often exploring themes of survival and resistance.',
        ]);
        Genre::create([ //3
            'name' => 'Adventure',
            'description' => 'Focuses on exciting journeys and exploration, often featuring a hero who faces challenges and discovers new worlds.',
        ]);
        Genre::create([ //4
            'name' => 'Romance',
            'description' => 'Centers on love and emotional connections between characters, often with heartfelt or dramatic moments.',
        ]);
        Genre::create([ //5
            'name' => 'Fantasy',
            'description' => 'Set in imaginative worlds with magic, mythical beings, and extraordinary adventures beyond reality.',
        ]);
        Genre::create([ //6
            'name' => 'Horror',
            'description' => 'Aims to evoke fear, dread, and suspense through supernatural elements, psychological tension, or gruesome imagery.',
        ]);
        Genre::create([ //7
            'name' => 'Classic',
            'description' => 'Timeless literature that has stood the test of time, often exploring universal themes and human experiences.',
        ]);

        // Non-Fiction
        Genre::create([ //8
            'name' => 'Biography',
            'description' => 'A detailed account of a person\'s life, often highlighting their achievements, struggles, and impact on society.',
        ]);
        Genre::create([ //9
            'name' => 'Self-Help',
            'description' => 'Provides guidance and strategies for personal development, mental well-being, and achieving life goals.',
        ]);
        Genre::create([ //10
            'name' => 'History',
            'description' => 'Explores past events, societies, and cultures, often providing insights into human behavior and societal evolution.',
        ]);
        Genre::create([ //11
            'name' => 'Coming-of-Age',
            'description' => 'Focuses on the growth and development of a protagonist, often dealing with themes of identity, relationships, and self-discovery.',
        ]);
        Genre::create([ //12
            'name' => 'Philosophy',
            'description' => 'Explores fundamental questions about existence, knowledge, values, and the nature of reality.',
        ]);
        Genre::create([ //13
            'name' => 'Science',
            'description' => 'Explains scientific concepts, discoveries, and advancements, often making complex topics accessible to the general public.',
        ]);
    } 
}
