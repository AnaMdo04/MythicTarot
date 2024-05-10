<?php

namespace Database\Factories;

use App\Models\Disenio;
use App\Models\Artista;
use Illuminate\Database\Eloquent\Factories\Factory;

class DisenioFactory extends Factory
{
    protected $model = Disenio::class;

    public function definition()
    {
        return [
            'nombre_disenio' => $this->faker->word,
            'precio' => $this->faker->randomFloat(2, 10, 100),
            'imagen_url' => $this->faker->imageUrl(640, 480, 'abstract'),
            'artista_id' => Artista::factory()
        ];
    }
}
