<?php

namespace Database\Factories;

use App\Models\ProductVariation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProductVariationFactory extends Factory
{
    protected $model = ProductVariation::class;

    public function definition(): array
    {
        return [
            'product_id' => $this->faker->randomNumber(),
            'sku' => $this->faker->word(),
            'price' => $this->faker->randomNumber(),
            'buy_price' => $this->faker->randomNumber(),
            'stock' => $this->faker->randomNumber(),
            'status' => $this->faker->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
