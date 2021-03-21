<?php

namespace Database\Seeders;

use App\Models\TipoDocumento;
use App\TableInfo\TipoDocumentoTableInfo;
use Illuminate\Database\Seeder;

class TipoDocumentoSeeder extends Seeder
{

    public function run()
    {
        TipoDocumento::create([
           TipoDocumentoTableInfo::CODIGO => '0',
           TipoDocumentoTableInfo::DESCRIPCION => 'SIN DOCUMENTO',
        ]);

        TipoDocumento::create([
            TipoDocumentoTableInfo::CODIGO => '1',
            TipoDocumentoTableInfo::DESCRIPCION => 'DNI',
        ]);

        TipoDocumento::create([
            TipoDocumentoTableInfo::CODIGO => '6',
            TipoDocumentoTableInfo::DESCRIPCION => 'RUC',
        ]);

        TipoDocumento::create([
            TipoDocumentoTableInfo::CODIGO => '4',
            TipoDocumentoTableInfo::DESCRIPCION => 'CARNET DE EXTRANJERIA',
        ]);

        TipoDocumento::create([
            TipoDocumentoTableInfo::CODIGO => '7',
            TipoDocumentoTableInfo::DESCRIPCION => 'PASAPORTE',
        ]);

        TipoDocumento::create([
            TipoDocumentoTableInfo::CODIGO => 'F',
            TipoDocumentoTableInfo::DESCRIPCION => 'DOC',
        ]);

        TipoDocumento::create([
            TipoDocumentoTableInfo::CODIGO => 'G',
            TipoDocumentoTableInfo::DESCRIPCION => 'DOCUMENTO MOD PQ',
        ]);

        TipoDocumento::create([
            TipoDocumentoTableInfo::CODIGO => 'H',
            TipoDocumentoTableInfo::DESCRIPCION => 'DOCUMENTO XY',
        ]);

        TipoDocumento::create([
            TipoDocumentoTableInfo::CODIGO => 'I',
            TipoDocumentoTableInfo::DESCRIPCION => 'PERMISO TEMPORAL',
        ]);

    }
}
