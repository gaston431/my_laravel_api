<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => Str::of($this->faker->sentence(10)),
            'slug' => Str::of($this->faker->sentence(10))->slug('-'),
            'likes' => 0,
            'content' => $this->faker->sentence(10),
            //'user_id' => 1,
        ];
    }
}
