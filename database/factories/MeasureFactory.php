<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MeasureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'unit' => $this->faker->unique()->randomElement(['unidad', 'metro', 'juego', 'litro', 'galón', 'botella', 'saco'])
        ];
    }
}
