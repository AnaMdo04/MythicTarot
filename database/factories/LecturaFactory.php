<?php

namespace Database\Factories;

use App\Models\Lectura;
use App\Models\User;
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
            'user_id' => User::factory()
        ];
    }
}
