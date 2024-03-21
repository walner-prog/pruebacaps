<?php

// database/seeders/UsuariosTableSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;

class UsuariosTableSeeder extends Seeder
{
    public function run()
    {
        // Usando el Factory para crear registros falsos 
        Usuario::factory()->count(10)->create();
    }
}
