<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lectura;
use App\Models\User;
use App\Models\Artista;

class LecturaSeeder extends Seeder
{
    public function run()
    {
        Lectura::create([
            'fecha_lectura' => now(),
            'user_id' => User::inRandomOrder()->first()->id,
        ]);
    }
}
