<?php

use Illuminate\Database\Seeder;

class MuseumLangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('museum_langs')->insert([
            [
                "lang_id" => 1,
                "museum_id" => 1,

            ]
        ]);
    }
}