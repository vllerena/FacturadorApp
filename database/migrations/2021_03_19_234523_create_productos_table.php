<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\TableInfo\TipoAfectacionTableInfo;
use App\TableInfo\ProductoTableInfo;
use App\TableInfo\TipoUnidadTableInfo;

class CreateProductosTable extends Migration
{
    private const TABLA_PRODUCTO = ProductoTableInfo::NOMBRE_TABLA;
    private const TABLA_TIPO_AFECTACION = TipoAfectacionTableInfo::NOMBRE_TABLA;
    private const TABLA_TIPO_UNIDAD = TipoUnidadTableInfo::NOMBRE_TABLA;
    public function up()
    {
        Schema::create(self::TABLA_PRODUCTO, function (Blueprint $table) {
            $table->id(ProductoTableInfo::ID);
            $table->string(ProductoTableInfo::NOMBRE)->nullable();
            $table->decimal(ProductoTableInfo::PRECIO, 11, 2)->nullable();
            $table->char(ProductoTableInfo::TIPO_PRECIO,2)->nullable();
            $table->foreignId(ProductoTableInfo::TIPO_AFECTACION)->nullable()->constrained(self::TABLA_TIPO_AFECTACION);
            $table->foreignId(ProductoTableInfo::TIPO_UNIDAD)->nullable()->constrained(self::TABLA_TIPO_UNIDAD);
        });
    }

    public function down()
    {
        Schema::dropIfExists(self::TABLA_PRODUCTO);
    }
}
