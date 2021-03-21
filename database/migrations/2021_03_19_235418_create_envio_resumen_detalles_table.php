<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnvioResumenDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('envio_resumen_detalles', function (Blueprint $table) {
            $table->id();
//            $table->foreignId('envio_resumens_id')->constrained('envio_resumens')->nullable();
//            $table->foreignId('ventas_id')->constrained('ventas')->nullable();
            $table->smallInteger('condicion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('envio_resumen_detalles');
    }
}
