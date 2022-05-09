<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => Str::random(10),
            'description' => $this->faker->text,
            'image' => $this->faker->imageUrl,
            'price' => $this->faker->numerify,
        ];
    }
}
