<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movies = [
            ["title" => "The Shawshank Redemption", "price" => "19.95", "tag_id" => "1"],
            ["title" => "The Godfather", "price" => "27.95", "tag_id" => "2"],
            ["title" => "The Dark Knight", "price" => "19.95"],
            ["title" => "Schindler's List", "price" => "19.95", "tag_id" => "2"],
            ["title" => "The Lord of the Rings: The Return of the King", "price" => "29.95"],
            ["title" => "12 Angry Men", "price" => "11.95"],
            ["title" => "The Godfather Part II", "price" => "27.95", "tag_id" => "2"],
            ["title" => "The Lord of the Rings: The Fellowship of the Ring", "price" => "29.95"],
            ["title" => "Pulp Fiction", "price" => "14.95", "tag_id" => "1"],
            ["title" => "Inception", "price" => "17.95", "tag_id" => "1"]
        ];

        foreach ($movies as $movie) {
            Movie::create($movie);
        }
    }
}
