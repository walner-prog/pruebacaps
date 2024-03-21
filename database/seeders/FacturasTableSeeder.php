<?php

// database/seeders/FacturasTableSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Factura;
use App\Models\Usuario;

class FacturasTableSeeder extends Seeder
{
    public function run()
    {
        // Usando el Factory para crear registros falsos
        Factura::factory()->count(10)->create([
            'ClienteID' => Usuario::inRandomOrder()->first()->UsuarioID,
            'EmisorID' => Usuario::inRandomOrder()->first()->UsuarioID,
        ]);
    }
}
