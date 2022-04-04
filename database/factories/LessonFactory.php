<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_id' => $this->faker->numberBetween(1, 200),
            'title' => $this->faker->title,
            'content' => $this->faker->text,
            'description' => $this->faker->text,
            'time' => $this->faker->numerify,
            'requirements' => $this->faker->text,
        ];
    }
}
