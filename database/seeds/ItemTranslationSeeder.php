<?php

use Illuminate\Database\Seeder;

class ItemTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('item_translations')->insert([
            [
                "item_id" => 1,
                "name" => "แจกัน",
                "lang_id" => 1,
                "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim mollitia aut magni adipisci, ratione repellat accusamus nisi est aliquid dicta possimus quidem et quibusdam consectetur tempora vero hic maxime fuga?",
            ],
            [
                "item_id" => 1,
                "name" => "แจกัน2",
                "lang_id" => 1,
                "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim mollitia aut magni adipisci, ratione repellat accusamus nisi est aliquid dicta possimus quidem et quibusdam consectetur tempora vero hic maxime fuga?",
            ],
            [
                "item_id" => 1,
                "name" => "แจกัน3",
                "lang_id" => 1,
                "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim mollitia aut magni adipisci, ratione repellat accusamus nisi est aliquid dicta possimus quidem et quibusdam consectetur tempora vero hic maxime fuga?",
            ]
        ]);
    }
}
