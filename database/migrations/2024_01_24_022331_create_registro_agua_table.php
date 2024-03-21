<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroAguaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_agua', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('NombreDeUsuario');
            $table->string('Mes');
            $table->unsignedBigInteger('medidor_id')->nullable();
            $table->foreign('medidor_id')->references('id')->on('medidores');
            $table->decimal('LecturaActual')->nullable();
            $table->decimal('LecturaAnterior')->nullable();
            $table->decimal('ConsumoM3')->nullable();
            $table->decimal('ValoraMetroCubico');
            $table->decimal('SaldoAnteriorMora');
            $table->decimal('TotalPago');
            $table->decimal('ValorRecibido');
            $table->string('NumeroRecibo');
            $table->decimal('SaldoActualMora');
            $table->unsignedBigInteger('lectura_medidor_id')->nullable();
            $table->foreign('lectura_medidor_id')->references('LecturaID')->on('lecturas_medidores');
            $table->string('NumeroMedidor')->nullable();
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
        Schema::dropIfExists('registro_agua');
    }
}
