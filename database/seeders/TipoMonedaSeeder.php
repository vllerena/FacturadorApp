<?php

namespace Database\Seeders;

use App\Models\TipoMoneda;
use App\TableInfo\TipoMonedaTableInfo;
use Illuminate\Database\Seeder;

class TipoMonedaSeeder extends Seeder
{

    public function run()
    {
        TipoMoneda::create([
           TipoMonedaTableInfo::CODIGO => 'PEN',
           TipoMonedaTableInfo::DESCRIPCION => 'SOLES'
        ]);

        TipoMoneda::create([
            TipoMonedaTableInfo::CODIGO => 'USD',
            TipoMonedaTableInfo::DESCRIPCION => 'DÓLARES'
        ]);
    }
}
