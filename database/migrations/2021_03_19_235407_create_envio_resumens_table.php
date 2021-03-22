<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\TableInfo\EnvioResumenTableInfo;
use App\TableInfo\EmisorTableInfo;

class CreateEnvioResumensTable extends Migration
{
    private const TABLA_ENVIO_RESUMEN = EnvioResumenTableInfo::NOMBRE_TABLA;
    private const TABLA_EMISOR = EmisorTableInfo::NOMBRE_TABLA;

    public function up()
    {
        Schema::create(self::TABLA_ENVIO_RESUMEN, function (Blueprint $table) {
            $table->id(EnvioResumenTableInfo::ID);
            $table->foreignId(EnvioResumenTableInfo::EMISOR)->constrained(self::TABLA_EMISOR);
            $table->date(EnvioResumenTableInfo::FECHA_ENVIO)->nullable();
            $table->integer(EnvioResumenTableInfo::CORRELATIVO)->nullable();
            $table->smallInteger(EnvioResumenTableInfo::RESUMEN)->nullable();
            $table->smallInteger(EnvioResumenTableInfo::BAJA)->nullable();
            $table->string(EnvioResumenTableInfo::NOMBRE_XML, 50)->nullable();
            $table->char(EnvioResumenTableInfo::FE_ESTADO, 1)->nullable();
            $table->string(EnvioResumenTableInfo::FE_CODIGO_ERROR, 10)->nullable();
            $table->text(EnvioResumenTableInfo::FE_MENSAJE_SUNAT)->nullable();
            $table->string(EnvioResumenTableInfo::TICKET, 50)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists(self::TABLA_ENVIO_RESUMEN);
    }
}
