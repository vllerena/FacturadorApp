<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\TableInfo\EnvioResumenDetalleTableInfo;

class EnvioResumenDetalle extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = EnvioResumenDetalleTableInfo::NOMBRE_TABLA;

    protected $fillable = [
        EnvioResumenDetalleTableInfo::ID,
        EnvioResumenDetalleTableInfo::ENVIO_RESUMEN,
        EnvioResumenDetalleTableInfo::VENTA,
        EnvioResumenDetalleTableInfo::CONDICION,

    ];
}
