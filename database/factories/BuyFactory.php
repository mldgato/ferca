<?php

namespace Database\Factories;

use Carbon\Carbon;

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
        $now = Carbon::now();
        $endDate = $now->format('Y-m-d'); // Fecha de hoy
        $twoMonthsAgo = $now->subMonths(2);
        $startDate = $this->faker->dateTimeBetween($twoMonthsAgo, $endDate)->format('Y-m-d');

        return [
            'invoice' => $this->faker->unique()->numberBetween(51111111, 99999999),
            'date' => $this->faker->dateTimeBetween($startDate, $endDate),
            'supplier_id' => Supplier::all()->random()->id,
            'user_id' => User::all()->random()->id,
        ];
    }
}
