<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // PermissionsSeeder.php
public function run()
{
    Permission::create(['name' => 'crear registros']);
    Permission::create(['name' => 'editar registros']);
    Permission::create(['name' => 'actualizar registros']);
    Permission::create(['name' => 'eliminar registros']);
}

}
