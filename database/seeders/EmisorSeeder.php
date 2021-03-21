<?php

namespace Database\Seeders;

use App\Models\Emisor;
use App\TableInfo\EmisorTableInfo;
use Illuminate\Database\Seeder;

class EmisorSeeder extends Seeder
{

    public function run()
    {
        Emisor::create([
           EmisorTableInfo::TIPO_DOCUMENTO => 3,
           EmisorTableInfo::RUC => '20123456789',
           EmisorTableInfo::RAZON_SOCIAL => 'EMPRESA EMISORA',
           EmisorTableInfo::NOMBRE_COMERCIAL => 'EMPRESA EMISORA',
           EmisorTableInfo::DIRECCION => 'DIRECCION NRO 123 - CHICLAYO - CHICLAYO - LAMBAYEQUE',
           EmisorTableInfo::PAIS => 'PE',
           EmisorTableInfo::DEPARTAMENTO => 'LAMBAYEQUE',
           EmisorTableInfo::PROVINCIA => 'CHICLAYO',
           EmisorTableInfo::DISTRITO => 'CHICLAYO',
           EmisorTableInfo::UBIGEO => '140101',
           EmisorTableInfo::USUARIO_SOL => 'MODDATOS',
           EmisorTableInfo::CLAVE_SOL => 'MODDATOS',
        ]);

        Emisor::create([
            EmisorTableInfo::TIPO_DOCUMENTO => 3,
            EmisorTableInfo::RUC => '20123123123',
            EmisorTableInfo::RAZON_SOCIAL => 'SEGUNDA EMPRESA EMISORA',
            EmisorTableInfo::NOMBRE_COMERCIAL => 'SEGUNDA EMPRESA EMISORA',
            EmisorTableInfo::DIRECCION => 'DIRECCION NRO 123 - CHICLAYO - CHICLAYO - LAMBAYEQUE',
            EmisorTableInfo::PAIS => 'PE',
            EmisorTableInfo::DEPARTAMENTO => 'LAMBAYEQUE',
            EmisorTableInfo::PROVINCIA => 'CHICLAYO',
            EmisorTableInfo::DISTRITO => 'CHICLAYO',
            EmisorTableInfo::UBIGEO => '140101',
            EmisorTableInfo::USUARIO_SOL => 'MODDATOS',
            EmisorTableInfo::CLAVE_SOL => 'MODDATOS',
        ]);
    }
}
