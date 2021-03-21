<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\TableInfo\EmisorTableInfo;
use App\TableInfo\TipoDocumentoTableInfo;

class CreateEmisorsTable extends Migration
{
    private const TABLA_EMISOR = EmisorTableInfo::NOMBRE_TABLA;
    private const TABLA_TIPO_DOCUMENTO = TipoDocumentoTableInfo::NOMBRE_TABLA;

    public function up()
    {
        Schema::create(self::TABLA_EMISOR, function (Blueprint $table) {
            $table->id(EmisorTableInfo::ID);
            $table->foreignId(EmisorTableInfo::TIPO_DOCUMENTO)->nullable()->constrained(self::TABLA_TIPO_DOCUMENTO);
            $table->char(EmisorTableInfo::RUC, 11)->nullable();
            $table->string(EmisorTableInfo::RAZON_SOCIAL, 100)->nullable();
            $table->string(EmisorTableInfo::NOMBRE_COMERCIAL, 100)->nullable();
            $table->string(EmisorTableInfo::DIRECCION, 100)->nullable();
            $table->string(EmisorTableInfo::PAIS, 100)->nullable();
            $table->string(EmisorTableInfo::DEPARTAMENTO, 100)->nullable();
            $table->string(EmisorTableInfo::PROVINCIA, 100)->nullable();
            $table->string(EmisorTableInfo::DISTRITO, 100)->nullable();
            $table->char(EmisorTableInfo::UBIGEO, 6)->nullable();
            $table->string(EmisorTableInfo::USUARIO_SOL, 20)->nullable();
            $table->string(EmisorTableInfo::CLAVE_SOL, 20)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists(self::TABLA_EMISOR);
    }
}
