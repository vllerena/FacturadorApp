<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\TableInfo\ClienteTableInfo;

class Cliente extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = ClienteTableInfo::NOMBRE_TABLA;

    protected $fillable = [
        ClienteTableInfo::ID,
        ClienteTableInfo::TIPO_DOCUMENTO,
        ClienteTableInfo::NUMERO_DOCUMENTO,
        ClienteTableInfo::RAZON_SOCIAL,
        ClienteTableInfo::DIRECCION,
    ];
}
