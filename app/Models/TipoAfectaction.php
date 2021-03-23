<?php

namespace App\Models;

use App\TableInfo\TipoAfectacionTableInfo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoAfectaction extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = TipoAfectacionTableInfo::NOMBRE_TABLA;

    protected $fillable = [
      TipoAfectacionTableInfo::ID,
      TipoAfectacionTableInfo::CODIGO,
      TipoAfectacionTableInfo::CODIGO,
      TipoAfectacionTableInfo::DESCRIPCION,
      TipoAfectacionTableInfo::CODIGO_AFECTACION,
      TipoAfectacionTableInfo::NOMBRE_AFECTACION,
      TipoAfectacionTableInfo::TAG_AFECTACION,
    ];

    public function producto()
    {
        return $this->hasMany(Producto::class);
    }
}
