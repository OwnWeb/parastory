<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Story;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Story>
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
            'author_id' => Author::factory(),
            'default_locale' => 'fr',
            'images' => [$this->faker->imageUrl],
        ];
    }
}
