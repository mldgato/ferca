<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Buy;

class BuySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $buys = Buy::factory(30)->create();

        foreach($buys as $buy)
        {
            $buy->products()->attach([
                rand(1, 33),
                rand(34, 66),
                rand(67, 100)
            ]);
        }
    }
}
