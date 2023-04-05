<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rack;

class RackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 15; $i++)
        {
            if($i < 10)
            {
                $estante = 'Estantería 0'.$i;
            }
            else
            {
                $estante = 'Estantería '.$i;
            }
            Rack::factory(1)->create([
                'name' => $estante,
                'warehouse_id' => 1
            ]);
        }
        for($i = 1; $i <= 10; $i++)
        {
            if($i < 10)
            {
                $estante = 'Estantería 0'.$i;
            }
            else
            {
                $estante = 'Estantería '.$i;
            }
            Rack::factory(1)->create([
                'name' => $estante,
                'warehouse_id' => 2
            ]);
        }
    }
}
