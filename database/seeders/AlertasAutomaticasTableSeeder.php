<?php

// database/seeders/AlertasAutomaticasTableSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AlertasAutomaticas;
use App\Models\Usuario;

class AlertasAutomaticasTableSeeder extends Seeder
{
    public function run()
    {
        // Usando el Factory para crear registros falsos
        AlertasAutomaticas::factory()->count(5)->create([
            'UsuarioID' => Usuario::inRandomOrder()->first()->UsuarioID,
        ]);
    }
}
