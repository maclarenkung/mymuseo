<?php

use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->insert([
            [
                "name" => "1P/1",
                "floor_id" => 1,
                "image_url" => "https://picsum.photos/200/300",
                "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim mollitia aut magni adipisci, ratione repellat accusamus nisi est aliquid dicta possimus quidem et quibusdam consectetur tempora vero hic maxime fuga?",
            ],
            [
                "name" => "1P/2",
                "floor_id" => 1,
                "image_url" => "https://picsum.photos/200/300",
                "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim mollitia aut magni adipisci, ratione repellat accusamus nisi est aliquid dicta possimus quidem et quibusdam consectetur tempora vero hic maxime fuga?",
            ],
            [
                "name" => "1P/3",
                "floor_id" => 1,
                "image_url" => "https://picsum.photos/200/300",
                "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim mollitia aut magni adipisci, ratione repellat accusamus nisi est aliquid dicta possimus quidem et quibusdam consectetur tempora vero hic maxime fuga?",
            ],
            [
                "name" => "2P/1",
                "floor_id" => 2,
                "image_url" => "https://picsum.photos/200/300",
                "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim mollitia aut magni adipisci, ratione repellat accusamus nisi est aliquid dicta possimus quidem et quibusdam consectetur tempora vero hic maxime fuga?",
            ],
            [
                "name" => "2P/2",
                "floor_id" => 2,
                "image_url" => "https://picsum.photos/200/300",
                "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim mollitia aut magni adipisci, ratione repellat accusamus nisi est aliquid dicta possimus quidem et quibusdam consectetur tempora vero hic maxime fuga?",
            ],
            [
                "name" => "3P/1",
                "floor_id" => 3,
                "image_url" => "https://picsum.photos/200/300",
                "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim mollitia aut magni adipisci, ratione repellat accusamus nisi est aliquid dicta possimus quidem et quibusdam consectetur tempora vero hic maxime fuga?",
            ]
        ]);
    }
}
