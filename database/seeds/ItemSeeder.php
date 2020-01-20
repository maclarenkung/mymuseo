<?php

use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            [
                "room_id" => 1,

                "image_url" => "https://picsum.photos/200/300",

            ],
            [
                "room_id" => 1,

                "image_url" => "https://picsum.photos/200/300",

            ],
            [
                "room_id" => 1,

                "image_url" => "https://picsum.photos/200/300",

            ]
        ]);
    }
}
