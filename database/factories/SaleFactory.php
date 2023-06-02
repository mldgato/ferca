<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use DateTime;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Fecha de inicio específica
        $startDate = new DateTime('2023-05-01');

        // Fecha de fin específica
        $endDate = date('Y-m-d');

        return [
            'invoice' => $this->faker->unique()->numberBetween(51111111, 99999999),
            'pay' => 0,
            'status' => 1,
            'date' => $this->faker->dateTimeBetween($startDate, $endDate),
            'customer_id' => Customer::all()->random()->id,
            'user_id' => User::all()->random()->id
        ];
    }
}