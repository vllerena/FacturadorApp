<?php

namespace Database\Seeders;

use App\Models\TipoUnidad;
use App\TableInfo\TipoUnidadTableInfo;
use Illuminate\Database\Seeder;

class TipoUnidadSeeder extends Seeder
{

    public function run()
    {
        TipoUnidad::create([
           TipoUnidadTableInfo::CODIGO => 'NIU',
           TipoUnidadTableInfo::DESCRIPCION => 'UNIDAD',
        ]);

        TipoUnidad::create([
            TipoUnidadTableInfo::CODIGO => 'KG',
            TipoUnidadTableInfo::DESCRIPCION => 'KILOS',
        ]);
    }
}
