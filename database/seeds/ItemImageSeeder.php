<?php

use Illuminate\Database\Seeder;

class ItemImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('item_images')->insert([
            [
                "item_id" => 1,
                "image_url" => "/uploads/images/items/IMG_1307.png"
            ],
            [
                "item_id" => 1,
                "image_url" => "/uploads/images/items/IMG_1307.png"
            ],
            [
                "item_id" => 2,
                "image_url" => "/uploads/images/items/1580539105.jpg"
            ]
        ]);
    }
}
