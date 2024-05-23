<?php

namespace Database\Factories;

use App\Models\Artista;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArtistaFactory extends Factory
{
    protected $model = Artista::class;

    public function definition()
    {
        return [
            'nombre_artista' => $this->faker->name,
            'biografia' => $this->faker->text(200),
            'user_id' => User::factory()
        ];
    }
}
