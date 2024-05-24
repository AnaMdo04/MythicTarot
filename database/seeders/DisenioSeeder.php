<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Disenio;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DisenioSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Asumiendo que tienes al menos algunos artistas ya en tu base de datos.
        // Asegúrate de que realmente existen registros en la tabla 'artistas' antes de ejecutar este seeder.
        $artistasIds = DB::table('artistas')->pluck('id')->toArray();

        foreach (range(1, 50) as $index) {
            Disenio::create([
                'nombre_disenio' => $faker->word,
                'precio' => $faker->randomFloat(2, 10, 100), // Genera un precio entre 10 y 100 con dos decimales.
                'imagen_url' => $faker->imageUrl(640, 480, 'abstract'), // Genera una URL de imagen ficticia.
                'artista_id' => $faker->randomElement($artistasIds) // Asigna un id de artista al azar.
            ]);
        }
    }
}
