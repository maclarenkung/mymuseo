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
                "floor_id" => 1,
                "name" => "ชั้น 1",
                "lang_id" => 1,

                "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim mollitia aut magni adipisci, ratione repellat accusamus nisi est aliquid dicta possimus quidem et quibusdam consectetur tempora vero hic maxime fuga?",
            ],
            [
                "floor_id" => 1,
                "name" => "ชั้น 2",
                "lang_id" => 1,

                "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim mollitia aut magni adipisci, ratione repellat accusamus nisi est aliquid dicta possimus quidem et quibusdam consectetur tempora vero hic maxime fuga?",
            ],
            [
                "floor_id" => 1,
                "name" => "ชั้น 3",
                "lang_id" => 1,

                "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim mollitia aut magni adipisci, ratione repellat accusamus nisi est aliquid dicta possimus quidem et quibusdam consectetur tempora vero hic maxime fuga?",
            ]
        ]);
    }
}
