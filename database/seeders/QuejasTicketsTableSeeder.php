<?php

// database/seeders/QuejasTicketsTableSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\QuejasTickets;
use App\Models\Usuario;

class QuejasTicketsTableSeeder extends Seeder
{
    public function run()
    {
        // Usando el Factory para crear registros falsos
        QuejasTickets::factory()->count(12)->create([
            'UsuarioID' => Usuario::inRandomOrder()->first()->UsuarioID,
        ]);
    }
}

