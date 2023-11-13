<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Manuel Dardón',
            'email' => 'manueldardon@hotmail.com',
            'password' => 'Alejandro31$'
        ]);

        User::create([
            'name' => 'Usuario Temporal',
            'email' => 'usuario@ferca.com',
            'password' => 'Ferc@23'
        ]);
    }
}
