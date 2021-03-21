<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\TableInfo\TablaParametricaTableInfo;

class CreateTablaParametricasTable extends Migration
{
    private const TABLA_PARAMETRICA = TablaParametricaTableInfo::NOMBRE_TABLA;

    public function up()
    {
        Schema::create(self::TABLA_PARAMETRICA, function (Blueprint $table) {
            $table->id(TablaParametricaTableInfo::ID);
            $table->string(TablaParametricaTableInfo::CODIGO, 5);
            $table->char(TablaParametricaTableInfo::TIPO, 1);
            $table->string(TablaParametricaTableInfo::DESCRIPCION)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists(self::TABLA_PARAMETRICA);
    }
}
