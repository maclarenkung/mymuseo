<?php

use Illuminate\Database\Seeder;

class SoundLangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sound_langs')->insert([
            [
                "model" => "App\Item",
                "relation_id" => 1,
                "lang_id" => 1,
                "file_url" => "https://www.computerhope.com/jargon/m/example.mp3"
            ]
        ]);
    }
}