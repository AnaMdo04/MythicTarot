<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Carta;
use App\Models\Disenio;
use App\Models\User;

class CartaSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();

        if ($users->isEmpty()) {
            $this->command->info('No users found. Skipping CartaSeeder.');
            return;
        }

        $cartas = [
            // Arcanos Mayores
            ['nombre_carta' => 'El Loco', 'descripcion' => 'Descripción de El Loco'],
            ['nombre_carta' => 'El Mago', 'descripcion' => 'Descripción de El Mago'],
            ['nombre_carta' => 'La Suma Sacerdotisa', 'descripcion' => 'Descripción de La Suma Sacerdotisa'],
            ['nombre_carta' => 'La Emperatriz', 'descripcion' => 'Descripción de La Emperatriz'],
            ['nombre_carta' => 'El Emperador', 'descripcion' => 'Descripción de El Emperador'],
            ['nombre_carta' => 'El Sumo Sacerdote', 'descripcion' => 'Descripción de El Sumo Sacerdote'],
            ['nombre_carta' => 'Los Enamorados', 'descripcion' => 'Descripción de Los Enamorados'],
            ['nombre_carta' => 'El Carro', 'descripcion' => 'Descripción de El Carro'],
            ['nombre_carta' => 'La Justicia', 'descripcion' => 'Descripción de La Justicia'],
            ['nombre_carta' => 'El Ermitaño', 'descripcion' => 'Descripción de El Ermitaño'],
            ['nombre_carta' => 'La Rueda de la Fortuna', 'descripcion' => 'Descripción de La Rueda de la Fortuna'],
            ['nombre_carta' => 'La Fuerza', 'descripcion' => 'Descripción de La Fuerza'],
            ['nombre_carta' => 'El Colgado', 'descripcion' => 'Descripción de El Colgado'],
            ['nombre_carta' => 'La Muerte', 'descripcion' => 'Descripción de La Muerte'],
            ['nombre_carta' => 'La Templanza', 'descripcion' => 'Descripción de La Templanza'],
            ['nombre_carta' => 'El Diablo', 'descripcion' => 'Descripción de El Diablo'],
            ['nombre_carta' => 'La Torre', 'descripcion' => 'Descripción de La Torre'],
            ['nombre_carta' => 'La Estrella', 'descripcion' => 'Descripción de La Estrella'],
            ['nombre_carta' => 'La Luna', 'descripcion' => 'Descripción de La Luna'],
            ['nombre_carta' => 'El Sol', 'descripcion' => 'Descripción de El Sol'],
            ['nombre_carta' => 'El Juicio', 'descripcion' => 'Descripción de El Juicio'],
            ['nombre_carta' => 'El Mundo', 'descripcion' => 'Descripción de El Mundo'],
            // Arcanos Menores - Copas
            ['nombre_carta' => 'As de Copas', 'descripcion' => 'Descripción de As de Copas'],
            ['nombre_carta' => 'Dos de Copas', 'descripcion' => 'Descripción de Dos de Copas'],
            ['nombre_carta' => 'Tres de Copas', 'descripcion' => 'Descripción de Tres de Copas'],
            ['nombre_carta' => 'Cuatro de Copas', 'descripcion' => 'Descripción de Cuatro de Copas'],
            ['nombre_carta' => 'Cinco de Copas', 'descripcion' => 'Descripción de Cinco de Copas'],
            ['nombre_carta' => 'Seis de Copas', 'descripcion' => 'Descripción de Seis de Copas'],
            ['nombre_carta' => 'Siete de Copas', 'descripcion' => 'Descripción de Siete de Copas'],
            ['nombre_carta' => 'Ocho de Copas', 'descripcion' => 'Descripción de Ocho de Copas'],
            ['nombre_carta' => 'Nueve de Copas', 'descripcion' => 'Descripción de Nueve de Copas'],
            ['nombre_carta' => 'Diez de Copas', 'descripcion' => 'Descripción de Diez de Copas'],
            ['nombre_carta' => 'Sota de Copas', 'descripcion' => 'Descripción de Sota de Copas'],
            ['nombre_carta' => 'Caballero de Copas', 'descripcion' => 'Descripción de Caballero de Copas'],
            ['nombre_carta' => 'Reina de Copas', 'descripcion' => 'Descripción de Reina de Copas'],
            ['nombre_carta' => 'Rey de Copas', 'descripcion' => 'Descripción de Rey de Copas'],
            // Arcanos Menores - Oros
            ['nombre_carta' => 'As de Oros', 'descripcion' => 'Descripción de As de Oros'],
            ['nombre_carta' => 'Dos de Oros', 'descripcion' => 'Descripción de Dos de Oros'],
            ['nombre_carta' => 'Tres de Oros', 'descripcion' => 'Descripción de Tres de Oros'],
            ['nombre_carta' => 'Cuatro de Oros', 'descripcion' => 'Descripción de Cuatro de Oros'],
            ['nombre_carta' => 'Cinco de Oros', 'descripcion' => 'Descripción de Cinco de Oros'],
            ['nombre_carta' => 'Seis de Oros', 'descripcion' => 'Descripción de Seis de Oros'],
            ['nombre_carta' => 'Siete de Oros', 'descripcion' => 'Descripción de Siete de Oros'],
            ['nombre_carta' => 'Ocho de Oros', 'descripcion' => 'Descripción de Ocho de Oros'],
            ['nombre_carta' => 'Nueve de Oros', 'descripcion' => 'Descripción de Nueve de Oros'],
            ['nombre_carta' => 'Diez de Oros', 'descripcion' => 'Descripción de Diez de Oros'],
            ['nombre_carta' => 'Sota de Oros', 'descripcion' => 'Descripción de Sota de Oros'],
            ['nombre_carta' => 'Caballero de Oros', 'descripcion' => 'Descripción de Caballero de Oros'],
            ['nombre_carta' => 'Reina de Oros', 'descripcion' => 'Descripción de Reina de Oros'],
            ['nombre_carta' => 'Rey de Oros', 'descripcion' => 'Descripción de Rey de Oros'],
            // Arcanos Menores - Espadas
            ['nombre_carta' => 'As de Espadas', 'descripcion' => 'Descripción de As de Espadas'],
            ['nombre_carta' => 'Dos de Espadas', 'descripcion' => 'Descripción de Dos de Espadas'],
            ['nombre_carta' => 'Tres de Espadas', 'descripcion' => 'Descripción de Tres de Espadas'],
            ['nombre_carta' => 'Cuatro de Espadas', 'descripcion' => 'Descripción de Cuatro de Espadas'],
            ['nombre_carta' => 'Cinco de Espadas', 'descripcion' => 'Descripción de Cinco de Espadas'],
            ['nombre_carta' => 'Seis de Espadas', 'descripcion' => 'Descripción de Seis de Espadas'],
            ['nombre_carta' => 'Siete de Espadas', 'descripcion' => 'Descripción de Siete de Espadas'],
            ['nombre_carta' => 'Ocho de Espadas', 'descripcion' => 'Descripción de Ocho de Espadas'],
            ['nombre_carta' => 'Nueve de Espadas', 'descripcion' => 'Descripción de Nueve de Espadas'],
            ['nombre_carta' => 'Diez de Espadas', 'descripcion' => 'Descripción de Diez de Espadas'],
            ['nombre_carta' => 'Sota de Espadas', 'descripcion' => 'Descripción de Sota de Espadas'],
            ['nombre_carta' => 'Caballero de Espadas', 'descripcion' => 'Descripción de Caballero de Espadas'],
            ['nombre_carta' => 'Reina de Espadas', 'descripcion' => 'Descripción de Reina de Espadas'],
            ['nombre_carta' => 'Rey de Espadas', 'descripcion' => 'Descripción de Rey de Espadas'],
            // Arcanos Menores - Bastos
            ['nombre_carta' => 'As de Bastos', 'descripcion' => 'Descripción de As de Bastos'],
            ['nombre_carta' => 'Dos de Bastos', 'descripcion' => 'Descripción de Dos de Bastos'],
            ['nombre_carta' => 'Tres de Bastos', 'descripcion' => 'Descripción de Tres de Bastos'],
            ['nombre_carta' => 'Cuatro de Bastos', 'descripcion' => 'Descripción de Cuatro de Bastos'],
            ['nombre_carta' => 'Cinco de Bastos', 'descripcion' => 'Descripción de Cinco de Bastos'],
            ['nombre_carta' => 'Seis de Bastos', 'descripcion' => 'Descripción de Seis de Bastos'],
            ['nombre_carta' => 'Siete de Bastos', 'descripcion' => 'Descripción de Siete de Bastos'],
            ['nombre_carta' => 'Ocho de Bastos', 'descripcion' => 'Descripción de Ocho de Bastos'],
            ['nombre_carta' => 'Nueve de Bastos', 'descripcion' => 'Descripción de Nueve de Bastos'],
            ['nombre_carta' => 'Diez de Bastos', 'descripcion' => 'Descripción de Diez de Bastos'],
            ['nombre_carta' => 'Sota de Bastos', 'descripcion' => 'Descripción de Sota de Bastos'],
            ['nombre_carta' => 'Caballero de Bastos', 'descripcion' => 'Descripción de Caballero de Bastos'],
            ['nombre_carta' => 'Reina de Bastos', 'descripcion' => 'Descripción de Reina de Bastos'],
            ['nombre_carta' => 'Rey de Bastos', 'descripcion' => 'Descripción de Rey de Bastos'],
        ];

        foreach ($cartas as $cartaData) {
            $disenio = Disenio::inRandomOrder()->first();
            $user = $users->random();
            if ($disenio) {
                Carta::create([
                    'nombre_carta' => $cartaData['nombre_carta'],
                    'descripcion' => $cartaData['descripcion'],
                    'imagen_url' => fake()->imageUrl(),
                    'disenio_id' => $disenio->id,
                    'user_id' => $user->id,
                ]);
            }
        }
    }
}
