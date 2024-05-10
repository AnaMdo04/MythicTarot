<?php

namespace Database\Factories;

use App\Models\CompraHasDisenio;
use App\Models\Compra;
use App\Models\Disenio;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompraHasDisenioFactory extends Factory
{
    protected $model = CompraHasDisenio::class;

    public function definition()
    {
        return [
            'compra_id' => Compra::factory(),
            'disenio_id' => Disenio::factory()
        ];
    }
}
