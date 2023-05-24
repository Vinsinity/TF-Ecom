<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class SiteSeoSettingFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'description' => $this->faker->text(),
            'keywords' => $this->faker->word(),
            'robots' => $this->faker->word(),
            'sitemap' => $this->faker->word(),
            'rss' => $this->faker->word(),
            'google_verify' => $this->faker->word(),
            'facebook_verify' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
