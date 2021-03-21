<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\TableInfo\TipoUnidadTableInfo;

class CreateTipoUnidadsTable extends Migration
{
    private const TABLA_TIPO_UNIDAD = TipoUnidadTableInfo::NOMBRE_TABLA;
    public function up()
    {
        Schema::create(self::TABLA_TIPO_UNIDAD, function (Blueprint $table) {
            $table->id(TipoUnidadTableInfo::ID);
            $table->char(TipoUnidadTableInfo::CODIGO, 3)->unique();
            $table->string(TipoUnidadTableInfo::DESCRIPCION, 50);
        });
    }

    public function down()
    {
        Schema::dropIfExists(self::TABLA_TIPO_UNIDAD);
    }
}
