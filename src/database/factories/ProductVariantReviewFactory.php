<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProductVariantReviewFactory extends Factory
{
    public function definition(): array
    {
        return [
            'product_variant_id' => $this->faker->randomNumber(),
            'rating' => $this->faker->randomFloat(),
            'comment' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
