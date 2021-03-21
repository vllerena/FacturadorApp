<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnvioResumensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('envio_resumens', function (Blueprint $table) {
            $table->id();
//            $table->foreignId('emisors_id')->constrained('emisors');
            $table->date('fecha_envio')->nullable();
            $table->integer('correlativo')->nullable();
            $table->smallInteger('resumen')->nullable();
            $table->smallInteger('baja')->nullable();
            $table->string('nombrexml', 50)->nullable();
            $table->char('feestado', 1)->nullable();
            $table->string('fecodigoerror', 10)->nullable();
            $table->text('femensajesunat')->nullable();
            $table->string('ticket', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('envio_resumens');
    }
}
