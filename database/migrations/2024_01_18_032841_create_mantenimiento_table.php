<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMantenimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // database/migrations/xxxx_xx_xx_create_mantenimiento_table.php
public function up()
{
    Schema::create('mantenimiento', function (Blueprint $table) {
        $table->id('MantenimientoID');
        $table->string('Tipo_Mantenimiento');
        $table->dateTime('Fecha_Programacion');
        $table->string('Descripcion');
        $table->foreignId('UsuarioID')->constrained('Users');
        $table->string('UbicacionOEspecifico')->nullable();
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
        Schema::dropIfExists('mantenimiento');
    }
}
