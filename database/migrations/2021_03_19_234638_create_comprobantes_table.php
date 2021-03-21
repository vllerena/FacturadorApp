<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\TableInfo\ComprobanteTableInfo;
use App\TableInfo\TipoComprobanteTableInfo;

class CreateComprobantesTable extends Migration
{
    private const TABLA_COMPROBANTE = ComprobanteTableInfo::NOMBRE_TABLA;
    private const TABLA_TIPO_COMPROBANTE = TipoComprobanteTableInfo::NOMBRE_TABLA;

    public function up()
    {
        Schema::create(self::TABLA_COMPROBANTE, function (Blueprint $table) {
            $table->id(ComprobanteTableInfo::ID);
            $table->foreignId(ComprobanteTableInfo::TIPO_COMPROBANTE)->constrained(self::TABLA_TIPO_COMPROBANTE);
            $table->string(ComprobanteTableInfo::SERIE, 8)->nullable();
            $table->integer(ComprobanteTableInfo::CORRELATIVO)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists(self::TABLA_COMPROBANTE);
    }
}
