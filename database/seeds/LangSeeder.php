<?php

use Illuminate\Database\Seeder;

class LangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('langs')->insert([
            [
                "name" => "ไทย",
                "slug" => "TH",

            ],
            [
                "name" => "english",
                "slug" => "EN",

            ],
            [
                "name" => "Chinese",
                "slug" => "CN",

            ]
        ]);
    }
}
