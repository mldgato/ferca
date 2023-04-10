<?php

namespace Database\Seeders;

use App\Models\Warehouse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Warehouse::factory(1)->create([
            'name' => 'Bodega 1',
        ]);
        Warehouse::factory(1)->create([
            'name' => 'Bodega 2',
        ]);
    }
}
