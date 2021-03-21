<?php

namespace Database\Seeders;

use App\Models\TablaParametrica;
use App\TableInfo\TablaParametricaTableInfo;
use Illuminate\Database\Seeder;

class TablaParametricaSeeder extends Seeder
{

    public function run()
    {
        TablaParametrica::create([
            TablaParametricaTableInfo::CODIGO => '01',
            TablaParametricaTableInfo::TIPO => 'C',
            TablaParametricaTableInfo::DESCRIPCION => 'Anulación de la operación',
        ]);

        TablaParametrica::create([
            TablaParametricaTableInfo::CODIGO => '02',
            TablaParametricaTableInfo::TIPO => 'C',
            TablaParametricaTableInfo::DESCRIPCION => 'Anulación por error en el RUC',
        ]);

        TablaParametrica::create([
            TablaParametricaTableInfo::CODIGO => '03',
            TablaParametricaTableInfo::TIPO => 'C',
            TablaParametricaTableInfo::DESCRIPCION => 'Corrección por error en la descripción',
        ]);

        TablaParametrica::create([
            TablaParametricaTableInfo::CODIGO => '04',
            TablaParametricaTableInfo::TIPO => 'C',
            TablaParametricaTableInfo::DESCRIPCION => 'Descuento global',
        ]);

        TablaParametrica::create([
            TablaParametricaTableInfo::CODIGO => '05',
            TablaParametricaTableInfo::TIPO => 'C',
            TablaParametricaTableInfo::DESCRIPCION => 'Descuento por ítem',
        ]);

        TablaParametrica::create([
            TablaParametricaTableInfo::CODIGO => '06',
            TablaParametricaTableInfo::TIPO => 'C',
            TablaParametricaTableInfo::DESCRIPCION => 'Devolución total',
        ]);

        TablaParametrica::create([
            TablaParametricaTableInfo::CODIGO => '07',
            TablaParametricaTableInfo::TIPO => 'C',
            TablaParametricaTableInfo::DESCRIPCION => 'Devolución por ítem',
        ]);

        TablaParametrica::create([
            TablaParametricaTableInfo::CODIGO => '08',
            TablaParametricaTableInfo::TIPO => 'C',
            TablaParametricaTableInfo::DESCRIPCION => 'Bonificación',
        ]);

        TablaParametrica::create([
            TablaParametricaTableInfo::CODIGO => '09',
            TablaParametricaTableInfo::TIPO => 'C',
            TablaParametricaTableInfo::DESCRIPCION => 'Disminución en el valor',
        ]);

        TablaParametrica::create([
            TablaParametricaTableInfo::CODIGO => '10',
            TablaParametricaTableInfo::TIPO => 'C',
            TablaParametricaTableInfo::DESCRIPCION => 'Otros Conceptos',
        ]);

        TablaParametrica::create([
            TablaParametricaTableInfo::CODIGO => '11',
            TablaParametricaTableInfo::TIPO => 'C',
            TablaParametricaTableInfo::DESCRIPCION => 'Ajustes de operaciones de exportación',
        ]);

        TablaParametrica::create([
            TablaParametricaTableInfo::CODIGO => '12',
            TablaParametricaTableInfo::TIPO => 'C',
            TablaParametricaTableInfo::DESCRIPCION => 'Ajustes afectos al IVAP',
        ]);

        TablaParametrica::create([
            TablaParametricaTableInfo::CODIGO => '01',
            TablaParametricaTableInfo::TIPO => 'D',
            TablaParametricaTableInfo::DESCRIPCION => 'Intereses por mora',
        ]);

        TablaParametrica::create([
            TablaParametricaTableInfo::CODIGO => '02',
            TablaParametricaTableInfo::TIPO => 'D',
            TablaParametricaTableInfo::DESCRIPCION => 'Aumento en el valor',
        ]);

        TablaParametrica::create([
            TablaParametricaTableInfo::CODIGO => '03',
            TablaParametricaTableInfo::TIPO => 'D',
            TablaParametricaTableInfo::DESCRIPCION => 'Penalidades/ otros conceptos',
        ]);

        TablaParametrica::create([
            TablaParametricaTableInfo::CODIGO => '10',
            TablaParametricaTableInfo::TIPO => 'D',
            TablaParametricaTableInfo::DESCRIPCION => 'Ajustes de operaciones de exportación',
        ]);

        TablaParametrica::create([
            TablaParametricaTableInfo::CODIGO => '11',
            TablaParametricaTableInfo::TIPO => 'D',
            TablaParametricaTableInfo::DESCRIPCION => 'Ajustes afectos al IVAP',
        ]);
    }
}
