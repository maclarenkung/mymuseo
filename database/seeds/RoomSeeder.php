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

                "floor_id" => 1,
                "image_url" => "https://picsum.photos/200/300",
                "map_image_url" => "https://picsum.photos/200/300",

            ],
            [

                "floor_id" => 1,
                "image_url" => "https://picsum.photos/200/300",
                "map_image_url" => "https://picsum.photos/200/300",

            ],
            [

                "floor_id" => 1,
                "image_url" => "https://picsum.photos/200/300",
                "map_image_url" => "https://picsum.photos/200/300",

            ],
            [

                "floor_id" => 2,
                "image_url" => "https://picsum.photos/200/300",
                "map_image_url" => "https://picsum.photos/200/300",

            ],
            [

                "floor_id" => 2,
                "image_url" => "https://picsum.photos/200/300",
                "map_image_url" => "https://picsum.photos/200/300",

            ],
            [

                "floor_id" => 3,
                "image_url" => "https://picsum.photos/200/300",
                "map_image_url" => "https://picsum.photos/200/300",

            ]
        ]);
    }
}
