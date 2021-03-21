<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\TableInfo\VentaTableInfo;
use App\TableInfo\EmisorTableInfo;
use App\TableInfo\ClienteTableInfo;
use App\TableInfo\TipoComprobanteTableInfo;
use App\TableInfo\ComprobanteTableInfo;
use App\TableInfo\TipoMonedaTableInfo;

class CreateVentasTable extends Migration
{
    private const TABLA_VENTA = VentaTableInfo::NOMBRE_TABLA;
    private const TABLA_EMISOR = EmisorTableInfo::NOMBRE_TABLA;
    private const TABLA_CLIENTE = ClienteTableInfo::NOMBRE_TABLA;
    private const TABLA_TIPO_COMPROBANTE = TipoComprobanteTableInfo::NOMBRE_TABLA;
    private const TABLA_COMPROBANTE = ComprobanteTableInfo::NOMBRE_TABLA;
    private const TABLA_TIPO_MONEDA = TipoMonedaTableInfo::NOMBRE_TABLA;

    public function up()
    {
        Schema::create(self::TABLA_VENTA, function (Blueprint $table) {
            $table->id(VentaTableInfo::ID);
            $table->foreignId(VentaTableInfo::EMISOR)->nullable()->constrained(self::TABLA_EMISOR);
            $table->foreignId(VentaTableInfo::TIPO_COMPROBANTE)->nullable()->constrained(self::TABLA_TIPO_COMPROBANTE);
            $table->foreignId(VentaTableInfo::COMPROBANTE)->nullable()->constrained(self::TABLA_COMPROBANTE);
            $table->char(VentaTableInfo::SERIE, 4)->nullable();
            $table->integer(VentaTableInfo::CORRELATIVO)->nullable();
            $table->date(VentaTableInfo::FECHA_EMISION)->nullable();
            $table->foreignId(VentaTableInfo::TIPO_MONEDA)->nullable()->constrained(self::TABLA_TIPO_MONEDA);
            $table->decimal(VentaTableInfo::OP_GRAVADAS, 11, 2)->nullable();
            $table->decimal(VentaTableInfo::OP_EXONERADAS, 11, 2)->nullable();
            $table->decimal(VentaTableInfo::OP_INAFECTAS, 11, 2)->nullable();
            $table->decimal(VentaTableInfo::IGV, 11, 2)->nullable();
            $table->decimal(VentaTableInfo::TOTAL, 11, 2)->nullable();
            $table->foreignId(VentaTableInfo::CLIENTE)->nullable()->constrained(self::TABLA_CLIENTE);
            $table->char(VentaTableInfo::FE_ESTADO, 1)->nullable();
            $table->string(VentaTableInfo::FE_CODIGO_ERROR, 10)->nullable();
            $table->text(VentaTableInfo::FE_MENSAJE_SUNAT)->nullable();
            $table->string(VentaTableInfo::NOMBRE_XML, 50)->nullable();
            $table->text(VentaTableInfo::XML_BASE64)->nullable();
            $table->text(VentaTableInfo::CDR_BASE64)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists(self::TABLA_VENTA);
    }
}
