<?php

namespace App\Models;

use App\TableInfo\TipoComprobanteTableInfo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoComprobante extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = TipoComprobanteTableInfo::NOMBRE_TABLA;

    protected $fillable = [
        TipoComprobanteTableInfo::ID,
        TipoComprobanteTableInfo::CODIGO,
        TipoComprobanteTableInfo::DESCRIPCION,
    ];
}
