<?php

namespace Database\Factories;

use App\Models\UsuarioAmigo;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class UsuarioAmigoFactory extends Factory
{
    protected $model = UsuarioAmigo::class;

    public function definition()
    {
        return [
            'usuario_id1' => Usuario::factory(),
            'usuario_id2' => Usuario::factory()
        ];
    }
}
