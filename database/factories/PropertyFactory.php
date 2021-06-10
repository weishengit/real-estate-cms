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
            'beds' => $this->faker->numberBetween(1, 2),
            'baths' => $this->faker->numberBetween(1, 2),
            'parking' => $this->faker->numberBetween(0, 1),
            'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30890.05345698738!2d121.0209956286785!3d14.584444381011265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c835c77b9b79%3A0xdc4947c8b9d237f8!2sMandaluyong%2C%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1623298674963!5m2!1sen!2sph" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
        ];
    }
}
