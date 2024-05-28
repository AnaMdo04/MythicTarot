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
        $users = User::all();
        $lecturas = Lectura::all();

        foreach ($lecturas as $lectura) {
            foreach ($users as $user) {
                Comentario::create([
                    'texto' => fake()->sentence(),
                    'fecha_comentario' => now(),
                    'lectura_id' => $lectura->id,
                    'user_id' => $user->id,
                ]);
            }
        }
    }
}
