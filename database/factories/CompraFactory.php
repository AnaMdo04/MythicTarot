<?php

namespace Database\Factories;

use App\Models\Compra;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompraFactory extends Factory
{
    protected $model = Compra::class;

    public function definition()
    {
        return [
            'fecha_compra' => $this->faker->dateTimeThisYear(),
            'total' => $this->faker->numberBetween(20, 500),
            'user_id' => User::factory()
        ];
    }
}
