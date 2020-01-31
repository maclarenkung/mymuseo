<?php

use Illuminate\Database\Seeder;

class MuseumImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('museum_images')->insert([
            [
                "museum_id" => 1,
                "image_url" => "xxxxxx"

            ],
            [
                "museum_id" => 1,
                "image_url" => "xxxxxx"

            ],
            [
                "museum_id" => 1,
                "image_url" => "xxxxxx"

            ],
            [
                "museum_id" => 2,
                "image_url" => "xxxxxx"

            ],
            [
                "museum_id" => 2,
                "image_url" => "xxxxxx"

            ],
        ]);
    }
}
