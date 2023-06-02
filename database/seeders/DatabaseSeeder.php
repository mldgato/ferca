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

        \App\Models\Supplier::factory(10)->create();
        $this->call(WarehouseSeeder::class);
        $this->call(RackSeeder::class);
        \App\Models\Measure::factory(7)->create();
        \App\Models\Product::factory(100)->create();
        \App\Models\Customer::factory(5)->create();
        \App\Models\Buy::factory(10)->create();
        \App\Models\Buydetail::factory(50)->create();
        \App\Models\Sale::factory(10)->create();
        \App\Models\Saledetail::factory(50)->create();

        /* 
            UPDATE sales s
                JOIN (
                SELECT sale_id, SUM(quantity * price) AS total_pay
                FROM saledetails
                GROUP BY sale_id
                ) sd ON s.id = sd.sale_id
                SET s.pay = sd.total_pay;
        */
    }
}
