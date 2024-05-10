<?php

namespace Database\Factories;

use App\Models\Carta;
use App\Models\Disenio;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartaFactory extends Factory
{
    protected $model = Carta::class;

    public function definition()
    {
        return [
            'nombre_carta' => $this->faker->word,
            'descripcion' => $this->faker->sentence,
            'imagen_url' => $this->faker->imageUrl(640, 480, 'abstract'),
            'disenio_id' => Disenio::factory()
        ];
    }
}
