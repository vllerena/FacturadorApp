<?php

namespace App\Models;

use App\TableInfo\TablaParametricaTableInfo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TablaParametrica extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = TablaParametricaTableInfo::NOMBRE_TABLA;

    protected $fillable = [
        TablaParametricaTableInfo::ID,
        TablaParametricaTableInfo::CODIGO,
        TablaParametricaTableInfo::TIPO,
        TablaParametricaTableInfo::DESCRIPCION,
    ];
}
