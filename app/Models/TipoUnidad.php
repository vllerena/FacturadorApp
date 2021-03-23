<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\TableInfo\TipoUnidadTableInfo;

class TipoUnidad extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = TipoUnidadTableInfo::NOMBRE_TABLA;

    protected $fillable = [
        TipoUnidadTableInfo::ID,
        TipoUnidadTableInfo::CODIGO,
        TipoUnidadTableInfo::DESCRIPCION,
    ];

    public function producto()
    {
        return $this->hasMany(Producto::class);
    }
}
