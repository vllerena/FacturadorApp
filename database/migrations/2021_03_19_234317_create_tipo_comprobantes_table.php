<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\TableInfo\TipoComprobanteTableInfo;

class CreateTipoComprobantesTable extends Migration
{
    private const TABLA_TIPO_COMPROBANTE = TipoComprobanteTableInfo::NOMBRE_TABLA;
    public function up()
    {
        Schema::create(self::TABLA_TIPO_COMPROBANTE, function (Blueprint $table) {
            $table->id(TipoComprobanteTableInfo::ID);
            $table->char(TipoComprobanteTableInfo::CODIGO, 2);
            $table->string(TipoComprobanteTableInfo::DESCRIPCION, 100)->nullable()->default(null);
        });
    }

    public function down()
    {
        Schema::dropIfExists(self::TABLA_TIPO_COMPROBANTE);
    }
}
