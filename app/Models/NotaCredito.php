<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\TableInfo\NotaCreditoTableInfo;

class NotaCredito extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = NotaCreditoTableInfo::NOMBRE_TABLA;

    protected $fillable = [
        NotaCreditoTableInfo::ID,
        NotaCreditoTableInfo::EMISOR,
        NotaCreditoTableInfo::TIPO_COMPROBANTE,
        NotaCreditoTableInfo::COMPROBANTE,
        NotaCreditoTableInfo::SERIE,
        NotaCreditoTableInfo::CORRELATIVO,
        NotaCreditoTableInfo::FECHA_EMISION,
        NotaCreditoTableInfo::TIPO_MONEDA,
        NotaCreditoTableInfo::OP_GRAVADAS,
        NotaCreditoTableInfo::OP_EXONERADAS,
        NotaCreditoTableInfo::OP_INAFECTAS,
        NotaCreditoTableInfo::IGV,
        NotaCreditoTableInfo::TOTAL,
        NotaCreditoTableInfo::CLIENTE,
        NotaCreditoTableInfo::TIPO_COMPROBANTE_REF,
        NotaCreditoTableInfo::SERIE_REF,
        NotaCreditoTableInfo::CORRELATIVO_REF,
        NotaCreditoTableInfo::MOTIVO,
        NotaCreditoTableInfo::FE_ESTADO,
        NotaCreditoTableInfo::FE_CODIGO_ERROR,
        NotaCreditoTableInfo::FE_MENSAJE_SUNAT,
    ];
}
