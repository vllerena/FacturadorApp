<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\TableInfo\TipoDocumentoTableInfo;

class TipoDocumento extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = TipoDocumentoTableInfo::NOMBRE_TABLA;

    protected $fillable = [
        TipoDocumentoTableInfo::ID,
        TipoDocumentoTableInfo::CODIGO,
        TipoDocumentoTableInfo::DESCRIPCION,
    ];
}
