<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    public function run()
    {
        Categoria::create([
            'nombre_categoria' => fake()->word,
            'descripcion' => fake()->sentence
        ]);
    }
}
