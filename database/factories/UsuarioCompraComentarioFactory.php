<?php

namespace Database\Factories;

use App\Models\UsuarioCompraComentario;
use App\Models\User;
use App\Models\Compra;
use App\Models\Comentario;
use Illuminate\Database\Eloquent\Factories\Factory;

class UsuarioCompraComentarioFactory extends Factory
{
    protected $model = UsuarioCompraComentario::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'compra_id' => Compra::factory(),
            'comentario_id' => Comentario::factory()
        ];
    }
}
