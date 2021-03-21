<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\TableInfo\NotaCreditoTableInfo;
use App\TableInfo\EmisorTableInfo;
use App\TableInfo\ClienteTableInfo;
use App\TableInfo\TipoComprobanteTableInfo;
use App\TableInfo\ComprobanteTableInfo;
use App\TableInfo\TipoMonedaTableInfo;

class CreateNotaCreditosTable extends Migration
{
    private const TABLA_NOTA_CREDITO = NotaCreditoTableInfo::NOMBRE_TABLA;
    private const TABLA_EMISOR = EmisorTableInfo::NOMBRE_TABLA;
    private const TABLA_CLIENTE = ClienteTableInfo::NOMBRE_TABLA;
    private const TABLA_TIPO_COMPROBANTE = TipoComprobanteTableInfo::NOMBRE_TABLA;
    private const TABLA_COMPROBANTE = ComprobanteTableInfo::NOMBRE_TABLA;
    private const TABLA_TIPO_MONEDA = TipoMonedaTableInfo::NOMBRE_TABLA;

    public function up()
    {
        Schema::create(self::TABLA_NOTA_CREDITO, function (Blueprint $table) {
            $table->id(NotaCreditoTableInfo::ID);
            $table->foreignId(NotaCreditoTableInfo::EMISOR)->nullable()->constrained(self::TABLA_EMISOR);
            $table->foreignId(NotaCreditoTableInfo::TIPO_COMPROBANTE)->nullable()->constrained(self::TABLA_TIPO_COMPROBANTE);
            $table->foreignId(NotaCreditoTableInfo::COMPROBANTE)->nullable()->constrained(self::TABLA_COMPROBANTE);
            $table->char(NotaCreditoTableInfo::SERIE, 4)->nullable();
            $table->integer(NotaCreditoTableInfo::CORRELATIVO)->nullable();
            $table->date(NotaCreditoTableInfo::FECHA_EMISION)->nullable();
            $table->foreignId(NotaCreditoTableInfo::TIPO_MONEDA)->nullable()->constrained(self::TABLA_TIPO_MONEDA);
            $table->decimal(NotaCreditoTableInfo::OP_GRAVADAS, 11, 2)->nullable();
            $table->decimal(NotaCreditoTableInfo::OP_EXONERADAS, 11, 2)->nullable();
            $table->decimal(NotaCreditoTableInfo::OP_INAFECTAS, 11, 2)->nullable();
            $table->decimal(NotaCreditoTableInfo::IGV, 11, 2)->nullable();
            $table->decimal(NotaCreditoTableInfo::TOTAL, 11, 2)->nullable();
            $table->foreignId(NotaCreditoTableInfo::CLIENTE)->nullable()->constrained(self::TABLA_CLIENTE);
            $table->char(NotaCreditoTableInfo::TIPO_COMPROBANTE_REF, 2)->nullable();
            $table->char(NotaCreditoTableInfo::SERIE_REF, 4)->nullable();
            $table->integer(NotaCreditoTableInfo::CORRELATIVO_REF)->nullable();
            $table->string(NotaCreditoTableInfo::MOTIVO, 5)->nullable();
            $table->char(NotaCreditoTableInfo::FE_ESTADO, 1)->nullable();
            $table->string(NotaCreditoTableInfo::FE_CODIGO_ERROR, 10)->nullable();
            $table->text(NotaCreditoTableInfo::FE_MENSAJE_SUNAT)->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists(self::TABLA_NOTA_CREDITO);
    }
}
