<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Compra;
use App\Models\User;

class CompraSeeder extends Seeder
{
    public function run()
    {
        foreach (range(1, 20) as $index) {
            Compra::create([
                'fecha_compra' => now(),
                'total' => fake()->randomFloat(2, 10, 500),
                'user_id' => User::inRandomOrder()->first()->id
            ]);
        }
    }
}
