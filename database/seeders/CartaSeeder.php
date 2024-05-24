<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Carta;
use App\Models\Disenio;

class CartaSeeder extends Seeder
{
    public function run()
    {
        foreach(range(1, 50) as $index) {
            $disenio = Disenio::inRandomOrder()->first();
            if ($disenio) {
                Carta::create([
                    'nombre_carta' => fake()->words(3, true),
                    'descripcion' => fake()->sentence(),
                    'imagen_url' => fake()->imageUrl(),
                    'disenio_id' => $disenio->id,
                ]);
            }
        }
    }
}
