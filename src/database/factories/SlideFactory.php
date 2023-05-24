<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class SlideFactory extends Factory
{
    public function definition(): array
    {
        return [
            'content' => $this->faker->word(),
            'image' => $this->faker->word(),
            'status' => $this->faker->randomNumber(),
            'order' => $this->faker->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
