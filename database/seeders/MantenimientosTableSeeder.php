<?php

// database/seeders/MantenimientosTableSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mantenimiento;
use App\Models\Usuario;

class MantenimientosTableSeeder extends Seeder
{
    public function run()
    {
        // Usando el Factory para crear registros falsos
        Mantenimiento::factory()->count(8)->create([
            'UsuarioID' => Usuario::inRandomOrder()->first()->UsuarioID,
        ]);
    }
}
