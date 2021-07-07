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
        Settings::create(['name' => 'meta_site_name', 'value' => 'Real Estate']);
        Settings::create(['name' => 'meta_site_author', 'value' => 'Real Estate']);
        Settings::create(['name' => 'meta_site_description', 'value' => 'Real Estate']);
        Settings::create(['name' => 'meta_site_keywords', 'value' => 'real estate philippines, condo in manila, ']);
        Settings::create(['name' => 'contact', 'value' => 'Your Contact Number']);
        Settings::create(['name' => 'email', 'value' => 'realestate@example.com']);
        Settings::create(['name' => 'facebook', 'value' => 'https://www.facebook.com']);
        Settings::create(['name' => 'instagram', 'value' => 'https://www.instagram.com']);
        Settings::create(['name' => 'twitter', 'value' => 'https://www.twitter.com']);
        Settings::create(['name' => 'pinterest', 'value' => 'https://www.pinterest.com']);
        Settings::create(['name' => 'address', 'value' => 'Your Address']);
        Settings::create(['name' => 'privacy_policy', 'value' => 'Privacy Policy']);
    }
}
