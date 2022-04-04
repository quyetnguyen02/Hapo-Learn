<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'lesson_id' => $this->faker->numberBetween(1, 200),
            'name' => $this->faker->name,
            'thumbnail' => $this->faker->imageUrl,
            'type' => Str::random(5),
            'link' => $this->faker->url,
        ];
    }
}
