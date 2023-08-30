<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;


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
        $now = Carbon::now();
        $endDate = $now->format('Y-m-d'); // Fecha de hoy
        $twoMonthsAgo = $now->copy()->subMonths(2); // Copia de la fecha de hoy, dos meses atrás
        $startDate = $this->faker->dateTimeBetween($twoMonthsAgo, $endDate)->format('Y-m-d');

        return [
            'invoice' => $this->faker->unique()->numberBetween(51111111, 99999999),
            'pay' => 0,
            'status' => 1,
            'date' => $this->faker->dateTimeBetween($startDate, $endDate),
            'customer_id' => Customer::all()->random()->id,
            'user_id' => User::all()->random()->id,
        ];
    }
}
