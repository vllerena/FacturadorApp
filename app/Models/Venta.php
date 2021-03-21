<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\TableInfo\VentaTableInfo;

class Venta extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = VentaTableInfo::NOMBRE_TABLA;

    protected $fillable = [
        VentaTableInfo::ID,
        VentaTableInfo::EMISOR,
        VentaTableInfo::TIPO_COMPROBANTE,
        VentaTableInfo::COMPROBANTE,
        VentaTableInfo::SERIE,
        VentaTableInfo::CORRELATIVO,
        VentaTableInfo::FECHA_EMISION,
        VentaTableInfo::TIPO_MONEDA,
        VentaTableInfo::OP_GRAVADAS,
        VentaTableInfo::OP_EXONERADAS,
        VentaTableInfo::OP_INAFECTAS,
        VentaTableInfo::IGV,
        VentaTableInfo::TOTAL,
        VentaTableInfo::CLIENTE,
        VentaTableInfo::FE_ESTADO,
        VentaTableInfo::FE_CODIGO_ERROR,
        VentaTableInfo::FE_MENSAJE_SUNAT,
        VentaTableInfo::NOMBRE_XML,
        VentaTableInfo::XML_BASE64,
        VentaTableInfo::CDR_BASE64,
    ];
}
