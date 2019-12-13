<?php

use Illuminate\Database\Seeder;

class FloorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('floors')->insert([
            [
                "name" => "muse",
                "museum_id" => 1,
                "image_url" => "https://picsum.photos/200/300",
                "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim mollitia aut magni adipisci, ratione repellat accusamus nisi est aliquid dicta possimus quidem et quibusdam consectetur tempora vero hic maxime fuga?",
            ]
        ]);
    }
}