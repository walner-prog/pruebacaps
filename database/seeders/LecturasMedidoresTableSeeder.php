<?php

// database/seeders/LecturasMedidoresTableSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LecturaMedidor;
use App\Models\Usuario;

class LecturasMedidoresTableSeeder extends Seeder
{
    public function run()
    {
        // Usando el Factory para crear registros falsos
        LecturaMedidor::factory()->count(15)->create([
            'Usuario' => Usuario::inRandomOrder()->first()->UsuarioID,
        ]);
    }
}

