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
                "name" => "English",
                "slug" => "EN",

            ],
            [
                "name" => "中文",
                "slug" => "CN",

            ]
        ]);
    }
}
