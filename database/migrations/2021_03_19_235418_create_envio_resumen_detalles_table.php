<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\TableInfo\EnvioResumenTableInfo;
use App\TableInfo\EnvioResumenDetalleTableInfo;
use App\TableInfo\VentaTableInfo;

class CreateEnvioResumenDetallesTable extends Migration
{
    private const TABLA_ENVIO_RESUMEN_DETALLE = EnvioResumenDetalleTableInfo::NOMBRE_TABLA;
    private const TABLA_ENVIO_RESUMEN = EnvioResumenTableInfo::NOMBRE_TABLA;
    private const TABLA_VENTA = VentaTableInfo::NOMBRE_TABLA;

    public function up()
    {
        Schema::create(self::TABLA_ENVIO_RESUMEN_DETALLE, function (Blueprint $table) {
            $table->id(EnvioResumenDetalleTableInfo::ID);
            $table->foreignId(EnvioResumenDetalleTableInfo::ENVIO_RESUMEN)->nullable()->constrained(self::TABLA_ENVIO_RESUMEN);
            $table->foreignId(EnvioResumenDetalleTableInfo::VENTA)->nullable()->constrained(self::TABLA_VENTA);
            $table->smallInteger(EnvioResumenDetalleTableInfo::CONDICION)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists(self::TABLA_ENVIO_RESUMEN_DETALLE);
    }
}
