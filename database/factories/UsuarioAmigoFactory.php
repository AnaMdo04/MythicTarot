<?php

namespace Database\Factories;

use App\Models\UsuarioAmigo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UsuarioAmigoFactory extends Factory
{
    protected $model = UsuarioAmigo::class;

    public function definition()
    {
        return [
            'user_id1' => User::factory(),
            'user_id2' => User::factory()
        ];
    }
}
