<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Artista;
use App\Models\User;

class ArtistaSeeder extends Seeder
{
    public function run()
    {
        Artista::create([
            'nombre_artista' => fake()->name,
            'biografia' => fake()->text,
            'user_id' => User::inRandomOrder()->first()->id
        ]);
    }
}
