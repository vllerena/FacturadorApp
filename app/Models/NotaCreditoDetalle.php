<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\TableInfo\NotaCreditoDetalleTableInfo;

class NotaCreditoDetalle extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = NotaCreditoDetalleTableInfo::NOMBRE_TABLA;

    protected $fillable = [
        NotaCreditoDetalleTableInfo::ID,
        NotaCreditoDetalleTableInfo::VENTA,
        NotaCreditoDetalleTableInfo::ITEM,
        NotaCreditoDetalleTableInfo::PRODUCTO,
        NotaCreditoDetalleTableInfo::CANTIDAD,
        NotaCreditoDetalleTableInfo::VALOR_UNITARIO,
        NotaCreditoDetalleTableInfo::PRECIO_UNITARIO,
        NotaCreditoDetalleTableInfo::IGV,
        NotaCreditoDetalleTableInfo::PORCENTAJE_IGV,
        NotaCreditoDetalleTableInfo::VALOR_TOTAL,
        NotaCreditoDetalleTableInfo::IMPORTE_TOTAL,
    ];

}
