<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Carta;
use App\Models\Disenio;

class CartaUserDisenioSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();
        $cartas = Carta::all();
        $disenios = Disenio::all();

        foreach ($users as $user) {
            foreach ($cartas as $carta) {
                $disenio = $disenios->random();
                $user->cartas()->attach($carta->id, ['disenio_id' => $disenio->id]);
            }
        }
    }
}
