<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'taxnumber' => $this->faker->unique()->numberBetween(51111111, 99999999),
            'company' => $this->faker->unique()->word(20),
            'address' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
            'seller' => $this->faker->name(),
        ];
    }
}
