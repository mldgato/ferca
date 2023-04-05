<?php

namespace Database\Factories;

use App\Models\Buy;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class BuydetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'buy_id' => Buy::all()->random()->id,
            'product_id' => Product::all()->random()->id,
            'quantity' => $this->faker->numberBetween(1, 1000),
            'cost' => $this->faker->randomFloat(2, 1, 5000),
        ];
    }
}
