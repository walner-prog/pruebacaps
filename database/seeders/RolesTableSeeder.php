<?php

// database/seeders/RolesTableSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rol;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        // Usando el Factory para crear registros falsos
        Rol::factory()->count(5)->create();
    }
}
