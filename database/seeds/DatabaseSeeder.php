<?php

use App\Lang;
use App\Museum;
use App\MuseumLang;
use App\MuseumPackage;
use App\MuseumUser;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            [
                UserSeeder::class,
                MuseumSeeder::class,
                LangSeeder::class,
                MuseumLangSeeder::class,
                FloorSeeder::class,
                RoomSeeder::class,
                RoomImageSeeder::class,
                ItemSeeder::class,
                // SoundLangSeeder::class,
                MuseumUserSeeder::class,
                ItemTranslationSeeder::class,
                FloorTranslationSeeder::class,
                RoomTranslationSeeder::class,
                MuseumPackageSeeder::class,
                PackageSeeder::class,
                MuseumImageSeeder::class,
                ItemImageSeeder::class,
            ]
        );
    }
}
