<?php

use Illuminate\Database\Seeder;

class MuseumPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('museum_packages')->insert([
            [
                "museum_id" => 1,
                "package_id" => 1,
                "expiry_date" => '2020-01-31 00:00:00.000000'
            ],
            [
                "museum_id" => 2,
                "package_id" => 2,
                "expiry_date" => '2020-01-31 00:00:00.000000'

            ],
            [
                "museum_id" => 3,
                "package_id" => 3,
                "expiry_date" => '2020-01-31 00:00:00.000000'
            ]
        ]);
    }
}
