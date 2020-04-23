<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packages')->insert([
            [
                "name" => "small",
                "price" => 20000,
                "qrcode" => "unlimited",
                "item_max" => "100",

            ],
            [
                "name" => "medium",
                "price" => 25000,
                "qrcode" => "unlimited",
                "item_max" => "200",

            ],
            [
                "name" => "extra",
                "price" => 30000,
                "qrcode" => "unlimited",
                "item_max" => "300",

            ],

        ]);
    }
}
