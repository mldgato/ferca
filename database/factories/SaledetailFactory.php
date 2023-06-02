<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Saledetail>
 */
class SaledetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $product = Product::all()->random();
        return [
            'sale_id' => Sale::all()->random()->id,
            'product_id' => $product->id,
            'quantity' => $this->faker->numberBetween(1, 20),
            'price' => $product->price,
        ];
    }
}
