<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;
use App\Models\Disenio;
use Illuminate\Support\Facades\DB;

class CategoriaHasDisenioSeeder extends Seeder
{
    public function run()
    {
        DB::table('categoria_has_disenio')->insert([
            'categoria_id' => Categoria::inRandomOrder()->first()->id,
            'disenio_id' => Disenio::inRandomOrder()->first()->id
        ]);
    }
}
