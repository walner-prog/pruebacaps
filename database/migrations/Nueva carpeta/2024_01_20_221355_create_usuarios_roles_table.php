<?php


// database/migrations/create_usuarios_roles_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearUsuariosRolesTable extends Migration
{
    public function up()
    {
        Schema::create('usuarios_roles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('UsuarioID')->constrained('usuarios','UsuarioID');
            $table->foreignId('RolID')->constrained('rolescaps','RolID');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios_roles');
    }
}
