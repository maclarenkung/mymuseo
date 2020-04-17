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
                "image_url" => "/uploads/images/items/img1.jpg"
            ],
            [
                "item_id" => 1,
                "image_url" => "/uploads/images/items/img1_1.jpg"
            ],
            [
                "item_id" => 1,
                "image_url" => "/uploads/images/items/img1_2.jpg"
            ],
            [
                "item_id" => 2,
                "image_url" => "/uploads/images/items/img2.jpg"
            ],
            [
                "item_id" => 3,
                "image_url" => "/uploads/images/items/img3_1.jpg"
            ],
            [
                "item_id" => 3,
                "image_url" => "/uploads/images/items/img3_2.jpg"
            ],
            [
                "item_id" => 3,
                "image_url" => "/uploads/images/items/img3.jpg"
            ],

            [
                "item_id" => 4,
                "image_url" => "/uploads/images/items/img4_1.jpg"
            ],
            [
                "item_id" => 4,
                "image_url" => "/uploads/images/items/img4_2.jpg"
            ],
            [
                "item_id" => 5,
                "image_url" => "/uploads/images/items/img5_1.jpg"
            ],
            [
                "item_id" => 5,
                "image_url" => "/uploads/images/items/img5_2.jpg"
            ],
            [
                "item_id" => 6,
                "image_url" => "/uploads/images/items/img6_1.jpg"
            ],
            [
                "item_id" => 6,
                "image_url" => "/uploads/images/items/img6_2.jpg"
            ],
            [
                "item_id" => 7,
                "image_url" => "/uploads/images/items/img7_1.jpg"
            ],
            [
                "item_id" => 8,
                "image_url" => "/uploads/images/items/img8_1.jpg"
            ],
            [
                "item_id" => 9,
                "image_url" => "/uploads/images/items/img9_1.jpg"
            ],
            [
                "item_id" => 9,
                "image_url" => "/uploads/images/items/img9_2.jpg"
            ],
            [
                "item_id" => 9,
                "image_url" => "/uploads/images/items/img9_3.jpg"
            ],
            [
                "item_id" => 10,
                "image_url" => "/uploads/images/items/img10_1.jpg"
            ],
            [
                "item_id" => 10,
                "image_url" => "/uploads/images/items/img10_2.jpg"
            ],
            [
                "item_id" => 11,
                "image_url" => "/uploads/images/items/img11_1.jpg"
            ],
            [
                "item_id" => 11,
                "image_url" => "/uploads/images/items/img11_2.jpg"
            ],
            [
                "item_id" => 12,
                "image_url" => "/uploads/images/items/img12.jpg"
            ],
            [
                "item_id" => 13,
                "image_url" => "/uploads/images/items/img16_1.jpg"
            ],
            [
                "item_id" => 14,
                "image_url" => "/uploads/images/items/img17_1.jpg"
            ],

        ]);
    }
}
