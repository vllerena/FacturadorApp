<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\TableInfo\TipoAfectacionTableInfo;

class CreateTipoAfectactionsTable extends Migration
{
    private const TABLA_TIPO_AFECTACION = TipoAfectacionTableInfo::NOMBRE_TABLA;

    public function up()
    {
        Schema::create(self::TABLA_TIPO_AFECTACION, function (Blueprint $table) {
            $table->id(TipoAfectacionTableInfo::ID);
            $table->char(TipoAfectacionTableInfo::CODIGO, 3);
            $table->string(TipoAfectacionTableInfo::DESCRIPCION, 50);
            $table->char(TipoAfectacionTableInfo::CODIGO_AFECTACION, 4);
            $table->char(TipoAfectacionTableInfo::NOMBRE_AFECTACION, 3);
            $table->char(TipoAfectacionTableInfo::TAG_AFECTACION, 3);
        });
    }

    public function down()
    {
        Schema::dropIfExists(self::TABLA_TIPO_AFECTACION);
    }
}
