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

                "museum_id" => 1,
                "image_url" => "https://picsum.photos/200/300",
                "map_image_url" => "https://picsum.photos/200/300",

            ],
            [

                "museum_id" => 1,
                "image_url" => "https://picsum.photos/200/300",
                "map_image_url" => "https://picsum.photos/200/300",
            ],
            [

                "museum_id" => 1,
                "image_url" => "https://picsum.photos/200/300",
                "map_image_url" => "https://picsum.photos/200/300",

            ]


        ]);
    }
}
