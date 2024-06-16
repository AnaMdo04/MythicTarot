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

        $artistasIds = DB::table('artistas')->pluck('id')->toArray();

        foreach (range(1, 50) as $index) {
            Disenio::create([
                'nombre_disenio' => $faker->word,
                'precio' => $faker->randomFloat(2, 10, 100),
                'imagen_url' => $faker->imageUrl(640, 480, 'abstract'),
                'artista_id' => $faker->randomElement($artistasIds)
            ]);
        }
    }
}
