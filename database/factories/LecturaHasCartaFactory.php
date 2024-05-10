<?php

namespace Database\Factories;

use App\Models\LecturaHasCarta;
use App\Models\Lectura;
use App\Models\Carta;
use Illuminate\Database\Eloquent\Factories\Factory;

class LecturaHasCartaFactory extends Factory
{
    protected $model = LecturaHasCarta::class;

    public function definition()
    {
        return [
            'lectura_id' => Lectura::factory(),
            'carta_id' => Carta::factory()
        ];
    }
}
