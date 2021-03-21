<?php

namespace Database\Seeders;

use App\Models\TipoAfectaction;
use App\TableInfo\TipoAfectacionTableInfo;
use Illuminate\Database\Seeder;

class TipoAfectacionSeeder extends Seeder
{

    public function run()
    {
        TipoAfectaction::create([
            TipoAfectacionTableInfo::CODIGO => '10',
            TipoAfectacionTableInfo::DESCRIPCION => 'OP. GRAVADAS',
            TipoAfectacionTableInfo::CODIGO_AFECTACION => '1000',
            TipoAfectacionTableInfo::NOMBRE_AFECTACION => 'IGV',
            TipoAfectacionTableInfo::TAG_AFECTACION => 'VAT',
        ]);

        TipoAfectaction::create([
            TipoAfectacionTableInfo::CODIGO => '20',
            TipoAfectacionTableInfo::DESCRIPCION => 'OP. EXONERADAS',
            TipoAfectacionTableInfo::CODIGO_AFECTACION => '9997',
            TipoAfectacionTableInfo::NOMBRE_AFECTACION => 'EXO',
            TipoAfectacionTableInfo::TAG_AFECTACION => 'VAT',
        ]);

        TipoAfectaction::create([
            TipoAfectacionTableInfo::CODIGO => '30',
            TipoAfectacionTableInfo::DESCRIPCION => 'OP. INAFECTAS',
            TipoAfectacionTableInfo::CODIGO_AFECTACION => '9998',
            TipoAfectacionTableInfo::NOMBRE_AFECTACION => 'INA',
            TipoAfectacionTableInfo::TAG_AFECTACION => 'FRE',
        ]);
    }
}
