<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedidoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // En la migración de medidores
public function up()
{
    Schema::create('medidores', function (Blueprint $table) {
        $table->id(); // Esto asume que 'id' será un unsignedBigInteger
        $table->string('descripcion');
        $table->string('tipo');
        $table->string('ubicacion');
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
        Schema::dropIfExists('medidores');
    }
}
