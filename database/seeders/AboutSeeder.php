<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\About;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        About::create(['name' => 'about_header', 'value' => 'About Main Header']);
        About::create(['name' => 'about_cover_image', 'value' => 'about_cover_image.jpg']);
        About::create(['name' => 'about_side_image', 'value' => 'about_side_image.jpg']);
        About::create(['name' => 'about_title', 'value' => 'About Title']);
        About::create(['name' => 'about_description', 'value' => 'About Content']);
    }
}
