<?php

namespace Database\Seeders;

use App\Models\Producto;
use App\TableInfo\ProductoTableInfo;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{

    public function run()
    {
        Producto::create([
           ProductoTableInfo::NOMBRE => 'ACEITE',
           ProductoTableInfo::PRECIO => 5.00,
           ProductoTableInfo::TIPO_PRECIO => '01',
           ProductoTableInfo::TIPO_AFECTACION => 1,
           ProductoTableInfo::TIPO_UNIDAD => 1,
        ]);

        Producto::create([
            ProductoTableInfo::NOMBRE => 'JABON',
            ProductoTableInfo::PRECIO => 3.00,
            ProductoTableInfo::TIPO_PRECIO => '01',
            ProductoTableInfo::TIPO_AFECTACION => 1,
            ProductoTableInfo::TIPO_UNIDAD => 1,
        ]);

        Producto::create([
            ProductoTableInfo::NOMBRE => 'CUADERNO',
            ProductoTableInfo::PRECIO => 5.00,
            ProductoTableInfo::TIPO_PRECIO => '01',
            ProductoTableInfo::TIPO_AFECTACION => 1,
            ProductoTableInfo::TIPO_UNIDAD => 1,
        ]);

        Producto::create([
            ProductoTableInfo::NOMBRE => 'PAPEL HIGIÉNICO',
            ProductoTableInfo::PRECIO => 0.50,
            ProductoTableInfo::TIPO_PRECIO => '01',
            ProductoTableInfo::TIPO_AFECTACION => 1,
            ProductoTableInfo::TIPO_UNIDAD => 1,
        ]);

        Producto::create([
            ProductoTableInfo::NOMBRE => 'ALCOHOL',
            ProductoTableInfo::PRECIO => 6.00,
            ProductoTableInfo::TIPO_PRECIO => '01',
            ProductoTableInfo::TIPO_AFECTACION => 1,
            ProductoTableInfo::TIPO_UNIDAD => 1,
        ]);

        Producto::create([
            ProductoTableInfo::NOMBRE => 'LIBRO NORMA',
            ProductoTableInfo::PRECIO => 100.00,
            ProductoTableInfo::TIPO_PRECIO => '01',
            ProductoTableInfo::TIPO_AFECTACION => 2,
            ProductoTableInfo::TIPO_UNIDAD => 1,
        ]);

        Producto::create([
            ProductoTableInfo::NOMBRE => 'PLATANOS',
            ProductoTableInfo::PRECIO => 1.00,
            ProductoTableInfo::TIPO_PRECIO => '01',
            ProductoTableInfo::TIPO_AFECTACION => 3,
            ProductoTableInfo::TIPO_UNIDAD => 1,
        ]);

        Producto::create([
            ProductoTableInfo::NOMBRE => 'MANZANA',
            ProductoTableInfo::PRECIO => 2.50,
            ProductoTableInfo::TIPO_PRECIO => '01',
            ProductoTableInfo::TIPO_AFECTACION => 3,
            ProductoTableInfo::TIPO_UNIDAD => 1,
        ]);

        Producto::create([
            ProductoTableInfo::NOMBRE => 'DESCUENTO GLOBAL',
            ProductoTableInfo::PRECIO => 0.00,
            ProductoTableInfo::TIPO_PRECIO => '01',
            ProductoTableInfo::TIPO_AFECTACION => 1,
            ProductoTableInfo::TIPO_UNIDAD => 1,
        ]);

        Producto::create([
            ProductoTableInfo::NOMBRE => 'INTERÉS MORA GENERAL',
            ProductoTableInfo::PRECIO => 0.00,
            ProductoTableInfo::TIPO_PRECIO => '01',
            ProductoTableInfo::TIPO_AFECTACION => 1,
            ProductoTableInfo::TIPO_UNIDAD => 1,
        ]);
    }
}
