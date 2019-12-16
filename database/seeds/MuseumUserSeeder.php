<?php

use Illuminate\Database\Seeder;

class MuseumUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('museum_users')->insert([
            [
                "user_id" => 2,
                "museum_id" => 1,

            ],
            [
                "user_id" => 2,
                "museum_id" => 2,
            ],
        ]);
    }
}