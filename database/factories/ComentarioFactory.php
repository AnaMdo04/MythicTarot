<?php

namespace Database\Factories;

use App\Models\Comentario;
use App\Models\Lectura;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComentarioFactory extends Factory
{
    protected $model = Comentario::class;

    public function definition()
    {
        return [
            'texto' => $this->faker->paragraph,
            'fecha_comentario' => $this->faker->dateTimeThisYear(),
            'lectura_id' => Lectura::factory(),
            'usuario_id' => Usuario::factory()
        ];
    }
}
