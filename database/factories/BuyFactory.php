<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Supplier;

class BuyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'invoice' => $this->faker->unique()->numberBetween(51111111, 99999999),
            'date' => $this->faker->date(),
            'supplier_id' => Supplier::all()->random()->id,
        ];
    }
}
