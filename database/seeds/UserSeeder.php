<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {

        DB::table('users')->insert([
            [
                "name" => "admin",
                "email" => "admin@mymuse.com",
                "password" => bcrypt('123456'),
                "role" => 1,
            ],
            [
                "name" => "customer",
                "email" => "customer@mymuse.com",
                "password" => bcrypt('123456'),
                "role" => 2,
            ],
        ]);
    }
}