<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Carta;
use App\Models\Disenio;
use App\Models\User;

class CartaSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();

        if ($users->isEmpty()) {
            $this->command->info('No users found. Skipping CartaSeeder.');
            return;
        }

        foreach (range(1, 50) as $index) {
            $disenio = Disenio::inRandomOrder()->first();
            $user = $users->random();
            if ($disenio) {
                Carta::create([
                    'nombre_carta' => fake()->words(3, true),
                    'descripcion' => fake()->sentence(),
                    'imagen_url' => fake()->imageUrl(),
                    'disenio_id' => $disenio->id,
                    'user_id' => $user->id,
                ]);
            }
        }
    }
}
