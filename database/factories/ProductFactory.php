<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique->words(4, true);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'cover' => '',
            'images' => [],
            'quantity' => $this->faker->numberBetween(100, 500),
            'regular_price' => $this->faker->numberBetween(10, 600),
            'short_description' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->boolean(),
            'updated_at' => $this->faker->dateTime(),
            'created_at' => $this->faker->dateTime(),
        ];
    }
}
