<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\TableInfo\VentaDetalleTableInfo;

class VentaDetalle extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = VentaDetalleTableInfo::NOMBRE_TABLA;

    protected $fillable = [
        VentaDetalleTableInfo::ID,
        VentaDetalleTableInfo::VENTA,
        VentaDetalleTableInfo::ITEM,
        VentaDetalleTableInfo::PRODUCTO,
        VentaDetalleTableInfo::CANTIDAD,
        VentaDetalleTableInfo::VALOR_UNITARIO,
        VentaDetalleTableInfo::PRECIO_UNITARIO,
        VentaDetalleTableInfo::IGV,
        VentaDetalleTableInfo::PORCENTAJE_IGV,
        VentaDetalleTableInfo::VALOR_TOTAL,
        VentaDetalleTableInfo::IMPORTE_TOTAL,
    ];
}
