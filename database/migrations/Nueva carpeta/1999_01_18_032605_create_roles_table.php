<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // database/migrations/xxxx_xx_xx_create_roles_table.php
public function up()
{
    Schema::create('roles', function (Blueprint $table) {
        $table->id('RolID');
        $table->string('Nombre_Rol');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
