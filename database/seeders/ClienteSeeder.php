<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\TableInfo\ClienteTableInfo;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{

    public function run()
    {
        Cliente::create([
           ClienteTableInfo::TIPO_DOCUMENTO => 1,
           ClienteTableInfo::NUMERO_DOCUMENTO => '99999999',
           ClienteTableInfo::RAZON_SOCIAL => 'VARIOS',
           ClienteTableInfo::DIRECCION => '',
        ]);

        Cliente::create([
            ClienteTableInfo::TIPO_DOCUMENTO => 3,
            ClienteTableInfo::NUMERO_DOCUMENTO => '20123456789',
            ClienteTableInfo::RAZON_SOCIAL => 'EMPRESA TEST',
            ClienteTableInfo::DIRECCION => 'LIMA',
        ]);

        Cliente::create([
            ClienteTableInfo::TIPO_DOCUMENTO => 2,
            ClienteTableInfo::NUMERO_DOCUMENTO => '43535037',
            ClienteTableInfo::RAZON_SOCIAL => 'FERNANDO JACOBO QUIROZ CABANILLAS',
            ClienteTableInfo::DIRECCION => 'LIMA',
        ]);
    }
}
