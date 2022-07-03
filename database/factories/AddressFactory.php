<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
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
            'user_id' => '',
            'state_id' => '',
            'name' => $this->faker->name(),
            'firstname' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'company' => $this->faker->company(),
            'address1' => $this->faker->address(),
            'address2' => $this->faker->address(),
            'postcode' => $this->faker->postcode(),
            'city' => $this->faker->city(),
            'phone' => $this->faker->phoneNumber(),
            'phone_mobile' => $this->faker->phoneNumber(),
            'active' => true,
            'deleted' => null,
            'created_at' => $now,
            'updated_at' => $now,
        ];
    }
}
