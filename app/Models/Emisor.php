<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\TableInfo\EmisorTableInfo;

class Emisor extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = EmisorTableInfo::NOMBRE_TABLA;

    protected $fillable = [
        EmisorTableInfo::ID,
        EmisorTableInfo::TIPO_DOCUMENTO,
        EmisorTableInfo::RUC,
        EmisorTableInfo::RAZON_SOCIAL,
        EmisorTableInfo::NOMBRE_COMERCIAL,
        EmisorTableInfo::DIRECCION,
        EmisorTableInfo::PAIS,
        EmisorTableInfo::DEPARTAMENTO,
        EmisorTableInfo::PROVINCIA,
        EmisorTableInfo::DISTRITO,
        EmisorTableInfo::UBIGEO,
        EmisorTableInfo::USUARIO_SOL,
        EmisorTableInfo::CLAVE_SOL,
    ];
}
