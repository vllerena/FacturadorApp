<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\TableInfo\ComprobanteTableInfo;

class Comprobante extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = ComprobanteTableInfo::NOMBRE_TABLA;

    protected $fillable = [
        ComprobanteTableInfo::ID,
        ComprobanteTableInfo::TIPO_COMPROBANTE,
        ComprobanteTableInfo::SERIE,
        ComprobanteTableInfo::CORRELATIVO,
    ];
}
