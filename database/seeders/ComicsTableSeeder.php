<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comic;

class ComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comics = config('comics_db');
        foreach ($comics as $single_comic) {
            $comic = new Comic();
            $comic->title = $single_comic['title'];
            $comic->description = $single_comic['description'];
            $comic->thumb = $single_comic['thumb'];
            $comic->price = $single_comic['price'];
            $comic->series = $single_comic['series'];
            $comic->sale_date = $single_comic['sale_date'];
            $comic->type = $single_comic['type'];
            // foreach ($single_comic['artists'] as $artist) {
            //     $comic->artists = $artist;
            // };
            // $comic->writers = $single_comic['writers'];
            $comic->save();
        }
    }
}
