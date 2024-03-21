<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuejasTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // database/migrations/xxxx_xx_xx_create_quejas_tickets_table.php
public function up()
{
    Schema::create('quejas_tickets', function (Blueprint $table) {
        $table->id('TicketID');
        $table->foreignId('UsuarioID')->constrained('Users');
        $table->dateTime('Fecha_Creacion');
        $table->string('Descripcion');
        $table->string('Estado');
        $table->string('Prioridad')->nullable();
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
        Schema::dropIfExists('quejas_tickets');
    }
}
