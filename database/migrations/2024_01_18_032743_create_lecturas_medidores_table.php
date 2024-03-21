<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLecturasMedidoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   // database/migrations/xxxx_xx_xx_create_lecturas_medidores_table.php
// En la migración de lecturas_medidores
public function up()
{
    Schema::create('lecturas_medidores', function (Blueprint $table) {
        $table->id('LecturaID');
        $table->foreignId('MedidorID')->constrained('medidores');
        $table->foreignId('UsuarioID')->constrained('Users'); // Asegúrate de que 'usuarios' sea la tabla correcta
        $table->dateTime('Fecha_Lectura');
        $table->decimal('Cantidad_Agua_Leida');
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
        Schema::dropIfExists('lecturas_medidores');
    }
}
