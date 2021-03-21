<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\TableInfo\NotaCreditoDetalleTableInfo;
use App\TableInfo\VentaTableInfo;
use App\TableInfo\ProductoTableInfo;

class CreateNotaCreditoDetallesTable extends Migration
{
    private const TABLA_NOTA_CREDITO_DETALLE = NotaCreditoDetalleTableInfo::NOMBRE_TABLA;
    private const TABLA_VENTA = VentaTableInfo::NOMBRE_TABLA;
    private const TABLA_PRODUCTO = ProductoTableInfo::NOMBRE_TABLA;

    public function up()
    {
        Schema::create(self::TABLA_NOTA_CREDITO_DETALLE, function (Blueprint $table) {
            $table->id(NotaCreditoDetalleTableInfo::ID);
            $table->foreignId(NotaCreditoDetalleTableInfo::VENTA)->nullable()->constrained(self::TABLA_VENTA);
            $table->integer(NotaCreditoDetalleTableInfo::ITEM)->nullable();
            $table->foreignId(NotaCreditoDetalleTableInfo::PRODUCTO)->nullable()->constrained(self::TABLA_PRODUCTO);
            $table->decimal(NotaCreditoDetalleTableInfo::CANTIDAD, 11, 2)->nullable();
            $table->decimal(NotaCreditoDetalleTableInfo::VALOR_UNITARIO, 11, 2)->nullable();
            $table->decimal(NotaCreditoDetalleTableInfo::PRECIO_UNITARIO, 11, 2)->nullable();
            $table->decimal(NotaCreditoDetalleTableInfo::IGV, 11, 2)->nullable();
            $table->decimal(NotaCreditoDetalleTableInfo::PORCENTAJE_IGV, 11, 2)->nullable();
            $table->decimal(NotaCreditoDetalleTableInfo::VALOR_TOTAL, 11, 2)->nullable();
            $table->decimal(NotaCreditoDetalleTableInfo::IMPORTE_TOTAL, 11, 2)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists(self::TABLA_NOTA_CREDITO_DETALLE);
    }
}
