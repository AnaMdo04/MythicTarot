<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lectura;
use App\Models\User;

class LecturaSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();

        if ($users->isEmpty()) {
            $this->command->info('No users found. Skipping LecturaSeeder.');
            return;
        }

        foreach (range(1, 50) as $index) {
            $user = $users->random();
            Lectura::create([
                'fecha_lectura' => now(),
                'pregunta' => 'Pregunta de ejemplo ' . $index,
                'user_id' => $user->id,
                'tipo_tirada' => 'simple',
            ]);
        }
    }
}
