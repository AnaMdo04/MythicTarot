<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UsuarioFactory extends Factory
{
    protected $model = Usuario::class;

    public function definition()
    {
        return [
            'nombre_usuario' => $this->faker->userName,
            'correo' => $this->faker->unique()->safeEmail,
            'contraseña' => Hash::make('password'),
            'fecha_registro' => now(),
            'es_artista' => $this->faker->boolean
        ];
    }
}
