<?php

namespace Database\Factories;
use DateTime;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Supplier;
use App\Models\User;

class BuyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Fecha de inicio específica
        $startDate = new DateTime('2023-05-01');

        // Fecha de fin específica
        $endDate = date('Y-m-d');
        return [
            'invoice' => $this->faker->unique()->numberBetween(51111111, 99999999),
            'date' => $this->faker->dateTimeBetween($startDate, $endDate),
            'supplier_id' => Supplier::all()->random()->id,
            'user_id' => User::all()->random()->id
        ];
    }
}
