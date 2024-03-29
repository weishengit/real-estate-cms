<?php

namespace Database\Seeders;

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
        $this->call(UserSeeder::class);
        $this->call(SettingsSeeder::class);
        $this->call(AreaSeeder::class);
        $this->call(PropertySeeder::class);
        $this->call(GallerySeeder::class);
        $this->call(AmenitySeeder::class);
        $this->call(AboutSeeder::class);
    }
}
