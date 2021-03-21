<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\TableInfo\ClienteTableInfo;
use App\TableInfo\TipoDocumentoTableInfo;

class CreateClientesTable extends Migration
{
    private const TABLA_CLIENTE = ClienteTableInfo::NOMBRE_TABLA;
    private const TABLA_TIPO_DOCUMENTO = TipoDocumentoTableInfo::NOMBRE_TABLA;

    public function up()
    {
        Schema::create(self::TABLA_CLIENTE, function (Blueprint $table) {
            $table->id();
            $table->foreignId(ClienteTableInfo::TIPO_DOCUMENTO)->nullable()->constrained(self::TABLA_TIPO_DOCUMENTO);
            $table->string(ClienteTableInfo::NUMERO_DOCUMENTO, 15)->nullable();
            $table->string(ClienteTableInfo::RAZON_SOCIAL, 100)->nullable();
            $table->string(ClienteTableInfo::DIRECCION, 100)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists(self::TABLA_CLIENTE);
    }
}
