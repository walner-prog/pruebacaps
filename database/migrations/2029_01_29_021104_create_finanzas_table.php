<?php

// database/migrations/xxxx_xx_xx_create_finanzas_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinanzasTable extends Migration
{
    public function up()
    {
        Schema::create('finanzas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('registro_agua_id');
            $table->foreign('registro_agua_id')->references('user_id')->on('registro_agua')->onDelete('cascade');
            $table->string('Mes');
            $table->decimal('total_ingreso_mes', 10, 2);
            $table->decimal('total_egreso_mes', 10, 2);
            $table->date('fecha_de_cierre_mes');
            $table->decimal('saldo_actual_mora', 10, 2);
            // Agrega más campos según sea necesario
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('finanzas');
    }
}
