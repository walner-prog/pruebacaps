<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlertasAutomaticasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  // database/migrations/xxxx_xx_xx_create_alertas_automaticas_table.php
public function up()
{
    Schema::create('alertas_automaticas', function (Blueprint $table) {
        $table->id('AlertaID');
        $table->string('Tipo_Alerta');
        $table->string('Descripcion');
        $table->dateTime('Fecha_Hora_Activacion');
        $table->foreignId('UsuarioID')->constrained('Users',);
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
        Schema::dropIfExists('alertas_automaticas');
    }
}
