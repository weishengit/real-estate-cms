<?php

namespace Database\Factories;

use App\Models\Gallery;
use Illuminate\Database\Eloquent\Factories\Factory;

class GalleryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Gallery::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $property_number = $this->faker->numberBetween(1, 50);
        $image = 'gallery' . $this->faker->numberBetween(1, 6) . '.jpg';

        return [
            'property_id' => $property_number,
            'image' => $image
        ];
    }
}
