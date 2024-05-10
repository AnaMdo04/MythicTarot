<?php

namespace Database\Factories;

use App\Models\UsuarioInteresCategoria;
use App\Models\Usuario;
use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

class UsuarioInteresCategoriaFactory extends Factory
{
    protected $model = UsuarioInteresCategoria::class;

    public function definition()
    {
        return [
            'usuario_id' => Usuario::factory(),
            'categoria_id' => Categoria::factory(),
            'nivel_interes' => $this->faker->randomElement(['Alto', 'Medio', 'Bajo'])
        ];
    }
}
