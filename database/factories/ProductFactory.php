<?php

namespace Database\Factories;

use App\Models\Measure;
use App\Models\Rack;
use App\Models\Supplier;
use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $cost = $this->faker->numberBetween(1, 1000);
        $price = ($cost * 0.10) + $cost;

        $warehouse = Warehouse::all()->random()->id;

        if($warehouse == 1)
        {
            $rack = $this->faker->numberBetween(1, 15);
        }
        else
        {
            $rack = $this->faker->numberBetween(1, 10);
        }

        return [
            'cod' => $this->faker->unique()->numberBetween(10001, 99999),
            'name' => $this->faker->sentence(4), 
            'brand' => $this->faker->word(25), 
            'quantity' => $this->faker->numberBetween(0, 25),
            'cost' => $cost,
            'price' => $price,
            'supplier_id' => Supplier::all()->random()->id,
            'measure_id' => Measure::all()->random()->id,
            'warehouse_id' => $warehouse,
            'rack_id' => $rack
        ];
    }
}
