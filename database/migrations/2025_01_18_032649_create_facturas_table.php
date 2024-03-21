<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // database/migrations/xxxx_xx_xx_create_facturas_table.php
public function up()
{
    Schema::create('facturas', function (Blueprint $table) {
        $table->id('FacturaID');
        
        $table->foreignId('ClienteID')->constrained('Users');
        $table->decimal('Monto', 10, 2);
        // en la siguiente linea usuarios es la tabla referenciada y usuario id es el campo
        $table->foreignId('EmisorID')->constrained('Users');
        $table->timestamp('FechaDeEmision');
        $table->string('Estado_Pago');
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
        Schema::dropIfExists('facturas');
    }
}
