<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('products');
        Storage::makeDirectory('products');

        \App\Models\User::factory()->create([
            'name' => 'Manuel Dardón',
            'email' => 'manueldardon@hotmail.com',
            'password' => 'Alejandro31$'
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Usuario Temporal',
            'email' => 'usuario@ferca.com',
            'password' => 'Ferc@23'
        ]);

        \App\Models\Supplier::factory(10)->create();  //Producción
        $this->call(WarehouseSeeder::class);
        $this->call(RackSeeder::class);
        \App\Models\Measure::factory(7)->create();
        \App\Models\Product::factory(100)->create();     //Producción
        \App\Models\Customer::factory(5)->create();         //Producción
        \App\Models\Buy::factory(10)->create();             //Producción
        \App\Models\Buydetail::factory(50)->create();       //Producción
        \App\Models\Sale::factory(10)->create();            //Producción
        \App\Models\Saledetail::factory(50)->create();   //Producción
    }
}
