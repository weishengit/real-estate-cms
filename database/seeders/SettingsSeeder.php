<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Settings::create(['name' => 'sitename', 'value' => 'Real Estate']);
        Settings::create(['name' => 'contact', 'value' => '0911 111 1111']);
        Settings::create(['name' => 'email', 'value' => 'vistacondo@example.com']);
        Settings::create(['name' => 'facebook', 'value' => 'link to fb page']);
        Settings::create(['name' => 'instagram', 'value' => 'link to ig page']);
        Settings::create(['name' => 'twitter', 'value' => 'link to twitter page']);
        Settings::create(['name' => 'pinterest', 'value' => 'link to pinterest page']);
        Settings::create(['name' => 'address', 'value' => 'Your Address']);
    }
}
