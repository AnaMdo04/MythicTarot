<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            ArtistaSeeder::class,
            DisenioSeeder::class,
            CartaSeeder::class,
            CompraSeeder::class,
            LecturaSeeder::class,
            ComentarioSeeder::class,
            CategoriaSeeder::class,
            CategoriaHasDisenioSeeder::class
        ]);
    }
}
