<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\TableInfo\EnvioResumenTableInfo;

class EnvioResumen extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = EnvioResumenTableInfo::NOMBRE_TABLA;

    protected $fillable = [
        EnvioResumenTableInfo::ID,
        EnvioResumenTableInfo::EMISOR,
        EnvioResumenTableInfo::FECHA_ENVIO,
        EnvioResumenTableInfo::CORRELATIVO,
        EnvioResumenTableInfo::RESUMEN,
        EnvioResumenTableInfo::BAJA,
        EnvioResumenTableInfo::NOMBRE_XML,
        EnvioResumenTableInfo::FE_ESTADO,
        EnvioResumenTableInfo::FE_CODIGO_ERROR,
        EnvioResumenTableInfo::FE_MENSAJE_SUNAT,
        EnvioResumenTableInfo::TICKET,
    ];
}
