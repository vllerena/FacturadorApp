<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\TableInfo\TipoMonedaTableInfo;

class CreateTipoMonedasTable extends Migration
{
    private const TABLA_TIPO_MONEDA = TipoMonedaTableInfo::NOMBRE_TABLA;

    public function up()
    {
        Schema::create(self::TABLA_TIPO_MONEDA, function (Blueprint $table) {
            $table->id();
            $table->char(TipoMonedaTableInfo::CODIGO, 3);
            $table->string(TipoMonedaTableInfo::DESCRIPCION, 50);
        });
    }

    public function down()
    {
        Schema::dropIfExists(self::TABLA_TIPO_MONEDA);
    }
}
