<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\TableInfo\ProductoTableInfo;

class Producto extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = ProductoTableInfo::NOMBRE_TABLA;

    protected $fillable = [
        ProductoTableInfo::ID,
        ProductoTableInfo::NOMBRE,
        ProductoTableInfo::PRECIO,
        ProductoTableInfo::TIPO_PRECIO,
        ProductoTableInfo::TIPO_AFECTACION,
        ProductoTableInfo::TIPO_UNIDAD,
    ];

    public function tipoafectacion(){
        return $this->belongsTo(TipoAfectaction::class, ProductoTableInfo::TIPO_AFECTACION);
    }

    public function tipounidad(){
        return $this->belongsTo(TipoUnidad::class, ProductoTableInfo::TIPO_UNIDAD);
    }
}
