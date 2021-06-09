<?php

namespace Database\Factories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PropertyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Property::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $names = ['Mandaluyong', 'Makati', 'Quezon City', 'Pasig', 'Ortigas', 'Shaw', 'Alabang', 'Taguig', 'Manila'];
        $title = $this->faker->numberBetween(100, 400) . ' ' . $this->faker->randomElement($names) . $this->faker->randomElement(['', ' Heights']);
        $slug = SlugService::createSlug(Property::class, 'slug', $title);
        $image = 'cover-p' . $this->faker->numberBetween(1, 6) . '.jpg';

        return [
            'area_id' => $this->faker->numberBetween(1, 7),
            'title' => $title,
            'slug' => $slug,
            'cover_image' => $image,
            'address' => $this->faker->streetAddress,
            'introduction' => $this->faker->realText($this->faker->numberBetween(20, 30)),
            'description' => $this->faker->realText($this->faker->numberBetween(200, 300)),
            'type' => $this->faker->randomElement(['Rent', 'Sale', 'Rent/Sale']),
            'cost' => $this->faker->numberBetween(5000, 22000),
        ];
    }
}
