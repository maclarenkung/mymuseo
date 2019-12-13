<?php

use Illuminate\Database\Seeder;

class MuseumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('museums')->insert([
            [
                "name" => "muse",
                "address_url" => "https://goo.gl/maps/1aYRv9UAyevFvVnw5",
                "phonenumber" => "0871231234",
                "email" => "admin@muse.com",
                "website_url" => "admin@muse.com",
                "email" => "google.com",
                "image_url" => "https://picsum.photos/200/300",
                "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim mollitia aut magni adipisci, ratione repellat accusamus nisi est aliquid dicta possimus quidem et quibusdam consectetur tempora vero hic maxime fuga?",
            ],
            [
                "name" => "muse2",
                "address_url" => "https://goo.gl/maps/1aYRv9UAyevFvVnw5",
                "phonenumber" => "0871231234",
                "email" => "admin@muse.com",
                "website_url" => "admin@muse.com",
                "email" => "google.com",
                "image_url" => "https://picsum.photos/200/300",
                "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim mollitia aut magni adipisci, ratione repellat accusamus nisi est aliquid dicta possimus quidem et quibusdam consectetur tempora vero hic maxime fuga?",
            ]
        ]);
    }
}