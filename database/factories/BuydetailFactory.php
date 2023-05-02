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
        $product = Product::all()->random()->id;
        $cost = $product->cost;
        return [
            'buy_id' => Buy::all()->random()->id,
            'product_id' => $product,
            'quantity' => $this->faker->numberBetween(1, 10),
            'cost' => $cost,
        ];
    }
}
