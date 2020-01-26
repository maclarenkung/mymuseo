<?php

use Illuminate\Database\Seeder;

class FloorTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('floor_translations')->insert([
            [
                "lang_id" => 1,
                "floor_id" => 1,
                "name" => "ชั้น 1",
                "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim mollitia aut magni adipisci, ratione repellat accusamus nisi est aliquid dicta possimus quidem et quibusdam consectetur tempora vero hic maxime fuga?",
            ],
            [
                "lang_id" => 1,
                "floor_id" => 2,
                "name" => "ชั้น 2",
                "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim mollitia aut magni adipisci, ratione repellat accusamus nisi est aliquid dicta possimus quidem et quibusdam consectetur tempora vero hic maxime fuga?",
            ],
            [
                "lang_id" => 1,
                "floor_id" => 3,
                "name" => "ชั้น 3",

                "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim mollitia aut magni adipisci, ratione repellat accusamus nisi est aliquid dicta possimus quidem et quibusdam consectetur tempora vero hic maxime fuga?",
            ]
        ]);
    }
}
