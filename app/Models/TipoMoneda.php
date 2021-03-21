<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\TableInfo\TipoMonedaTableInfo;

class TipoMoneda extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = TipoMonedaTableInfo::NOMBRE_TABLA;

    protected $fillable = [
        TipoMonedaTableInfo::ID,
        TipoMonedaTableInfo::CODIGO,
        TipoMonedaTableInfo::DESCRIPCION,
    ];
}
