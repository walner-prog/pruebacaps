<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGastosTable extends Migration
{
    public function up()
    {
        Schema::create('gastos', function (Blueprint $table) {
            $table->id();
            $table->string('concepto');
            $table->decimal('monto', 10, 2);

            $table->date('fecha');
            $table->integer('mes');
            $table->string('nombre_mes')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gastos');
    }
}

