<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Story>
 */
class StoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'subtitle' => $this->faker->text(100),
            'content' => $this->faker->text(1000),
            'date' => $this->faker->date,
            'source_url' => $this->faker->url,
            'track_url' => $this->faker->url,
            'author_id' => \App\Models\Author::factory(),
            'default_locale' => 'fr',
            'images' => [$this->faker->imageUrl],
        ];
    }
}
