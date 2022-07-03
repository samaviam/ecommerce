<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $description = $this->faker->paragraph();

        return [
            'name' => '',
            'slug' => '',
            'description' => $description,
            'meta_title' => $this->faker->boolean() ? '' : $this->faker->unique->words(4, true),
            'meta_keywords' => $this->faker->boolean() ? '' : $this->faker->unique->words(4),
            'meta_description' => $this->faker->boolean() ? $description : $this->faker->paragraph(),
            'show' => $this->faker->boolean(),
            'active' => $this->faker->boolean(),
            'updated_at' => $this->faker->dateTime(),
            'created_at' => $this->faker->dateTime(),
        ];
    }
}
