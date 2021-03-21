<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\TableInfo\VentaDetalleTableInfo;
use App\TableInfo\VentaTableInfo;
use App\TableInfo\ProductoTableInfo;

class CreateVentaDetallesTable extends Migration
{
    private const TABLA_VENTA_DETALLE = VentaDetalleTableInfo::NOMBRE_TABLA;
    private const TABLA_VENTA = VentaTableInfo::NOMBRE_TABLA;
    private const TABLA_PRODUCTO = ProductoTableInfo::NOMBRE_TABLA;

    public function up()
    {
        Schema::create(self::TABLA_VENTA_DETALLE, function (Blueprint $table) {
            $table->id(VentaDetalleTableInfo::ID);
            $table->foreignId(VentaDetalleTableInfo::VENTA)->nullable()->constrained(self::TABLA_VENTA);
            $table->integer(VentaDetalleTableInfo::ITEM)->nullable();
            $table->foreignId(VentaDetalleTableInfo::PRODUCTO)->nullable()->constrained(self::TABLA_PRODUCTO);
            $table->decimal(VentaDetalleTableInfo::CANTIDAD, 11, 2)->nullable();
            $table->decimal(VentaDetalleTableInfo::VALOR_UNITARIO, 11, 2)->nullable();
            $table->decimal(VentaDetalleTableInfo::PRECIO_UNITARIO, 11, 2)->nullable();
            $table->decimal(VentaDetalleTableInfo::IGV, 11, 2)->nullable();
            $table->decimal(VentaDetalleTableInfo::PORCENTAJE_IGV, 11, 2)->nullable();
            $table->decimal(VentaDetalleTableInfo::VALOR_TOTAL, 11, 2)->nullable();
            $table->decimal(VentaDetalleTableInfo::IMPORTE_TOTAL, 11, 2)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists(self::TABLA_VENTA_DETALLE);
    }
}
