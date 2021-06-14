<?php

namespace Database\Factories;

use App\Models\Amenity;
use Illuminate\Database\Eloquent\Factories\Factory;

class AmenityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Amenity::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $amenities = [
            'Balcony',
            'Parking',
            'Cable Tv',
            'Internet',
            '24-hour security',
            'Fitness and Wellness Gym',
            'Function Room',
            'Swimming Pool'
        ];

        return [
            'property_id' => $this->faker->numberBetween(1, 50),
            'name' => $this->faker->randomElement($amenities)
        ];
    }
}
