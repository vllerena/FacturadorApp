<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\TableInfo\TipoDocumentoTableInfo;

class CreateTipoDocumentosTable extends Migration
{
    private const TABLA_TIPO_DOCUMENTO = TipoDocumentoTableInfo::NOMBRE_TABLA;

    public function up()
    {
        Schema::create(self::TABLA_TIPO_DOCUMENTO, function (Blueprint $table) {
            $table->id(TipoDocumentoTableInfo::ID);
            $table->char(TipoDocumentoTableInfo::CODIGO, 1);
            $table->string(TipoDocumentoTableInfo::DESCRIPCION, 50)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists(self::TABLA_TIPO_DOCUMENTO);
    }
}
