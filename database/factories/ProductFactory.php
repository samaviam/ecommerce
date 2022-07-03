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
            'category_id' => '',
            'user_ids' => [],
            'name' => $name,
            'slug' => Str::slug($name),
            'cover' => '',
            'images' => [],
            'reference' => 'ref-' . $this->faker->numberBetween(0000, 9999),
            'quantity' => $this->faker->numberBetween(100, 500),
            'regular_price' => $this->faker->numberBetween(10000000, 100000000),
            'short_description' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'active' => $this->faker->boolean(),
            'updated_at' => $this->faker->dateTime(),
            'created_at' => $this->faker->dateTime(),
        ];
    }
}
