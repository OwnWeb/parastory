<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'website_url' => $this->faker->url,
            'facebook_url' => $this->faker->url,
            'instagram_url' => $this->faker->url,
            'xcontest_url' => $this->faker->url,
            'paragliding_since' => $this->faker->year,
            'picture_url' => $this->faker->imageUrl,
        ];
    }
}
