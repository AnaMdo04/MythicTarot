<?php

namespace Database\Factories;

use App\Models\Compra;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompraFactory extends Factory
{
    protected $model = Compra::class;

    public function definition()
    {
        return [
            'fecha_compra' => $this->faker->dateTimeThisYear(),
            'total' => $this->faker->numberBetween(20, 500),
            'usuario_id' => Usuario::factory()
        ];
    }
}
