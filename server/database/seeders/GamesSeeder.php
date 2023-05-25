<?php

namespace Database\Seeders;

use Foostart\Category\Helpers\FoostartSeeder;
use Illuminate\Support\Facades\DB;

class GamesSeeder extends FoostartSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            ["game_name" => "Irregular verb", "game_image" => "./irregular.jpg"],
            ["game_name" => "Part of speech", "game_image" => "./part-of-speech.jpg"],
            ["game_name" => "Sentence", "game_image" => "./sentence.jpg"],
        ];
        DB::table('games')->insert($data);
    }
}
