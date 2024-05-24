<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comentario;
use App\Models\User;
use App\Models\Lectura;

class ComentarioSeeder extends Seeder
{
    public function run()
    {
        foreach(range(1, 50) as $index) {
            Comentario::create([
                'texto' => fake()->paragraph,
                'fecha_comentario' => now(),
                'lectura_id' => Lectura::inRandomOrder()->first()->id,  // Asegúrate de que existan lecturas
                'user_id' => User::inRandomOrder()->first()->id  // Asegúrate de que existan usuarios
            ]);
        }
    }
}
