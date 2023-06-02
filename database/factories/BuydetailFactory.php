<?php

namespace Database\Factories;

use App\Models\Buy;
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
        $buy = Buy::all()->random();
        $supplier = $buy->supplier;
        $product = $supplier->products()->inRandomOrder()->first();

        return [
            'buy_id' => $buy->id,
            'product_id' => $product->id,
            'quantity' => $this->faker->numberBetween(1, 10),
            'cost' => $product->cost,
        ];
    }
}
