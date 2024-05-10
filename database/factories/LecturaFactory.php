<?php

namespace Database\Factories;

use App\Models\Lectura;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class LecturaFactory extends Factory
{
    protected $model = Lectura::class;

    public function definition()
    {
        return [
            'fecha_lectura' => $this->faker->dateTimeThisYear(),
            'pregunta' => $this->faker->sentence,
            'respuesta' => $this->faker->paragraph,
            'usuario_id' => Usuario::factory()
        ];
    }
}
