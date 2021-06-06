<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::create(['name' => 'Mandaluyong']);
        Area::create(['name' => 'Katipunan']);
        Area::create(['name' => 'Makati']);
    }
}
