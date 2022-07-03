<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $now = now();
        return [
            'name' => '',
            'slug' => '',
            'description' => $this->faker->paragraph(20),
            'short_description' => $this->faker->sentence(15),
            'meta_title' => $this->faker->words(3, true),
            'meta_keywords' => $this->faker->words(6, true),
            'meta_description' => $this->faker->sentence(10),
            'active' => $this->faker->boolean(),
            'created_at' => $now,
            'updated_at' => $now,
        ];
    }
}
