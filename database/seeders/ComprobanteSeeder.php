<?php

namespace Database\Seeders;

use App\Models\Comprobante;
use App\TableInfo\ComprobanteTableInfo;
use Illuminate\Database\Seeder;

class ComprobanteSeeder extends Seeder
{

    public function run()
    {
        Comprobante::create([
            ComprobanteTableInfo::TIPO_COMPROBANTE => 1,
            ComprobanteTableInfo::SERIE => 'F001',
            ComprobanteTableInfo::CORRELATIVO => 3,
        ]);

        Comprobante::create([
            ComprobanteTableInfo::TIPO_COMPROBANTE => 1,
            ComprobanteTableInfo::SERIE => 'F002',
            ComprobanteTableInfo::CORRELATIVO => 1,
        ]);

        Comprobante::create([
            ComprobanteTableInfo::TIPO_COMPROBANTE => 2,
            ComprobanteTableInfo::SERIE => 'B001',
            ComprobanteTableInfo::CORRELATIVO => 2,
        ]);

        Comprobante::create([
            ComprobanteTableInfo::TIPO_COMPROBANTE => 3,
            ComprobanteTableInfo::SERIE => 'FN01',
            ComprobanteTableInfo::CORRELATIVO => 1,
        ]);

        Comprobante::create([
            ComprobanteTableInfo::TIPO_COMPROBANTE => 3,
            ComprobanteTableInfo::SERIE => 'BN01',
            ComprobanteTableInfo::CORRELATIVO => 1,
        ]);

        Comprobante::create([
            ComprobanteTableInfo::TIPO_COMPROBANTE => 4,
            ComprobanteTableInfo::SERIE => 'FD01',
            ComprobanteTableInfo::CORRELATIVO => 1,
        ]);

        Comprobante::create([
            ComprobanteTableInfo::TIPO_COMPROBANTE => 4,
            ComprobanteTableInfo::SERIE => 'BD01',
            ComprobanteTableInfo::CORRELATIVO => 1,
        ]);

        Comprobante::create([
            ComprobanteTableInfo::TIPO_COMPROBANTE => 6,
            ComprobanteTableInfo::SERIE => '20210317',
            ComprobanteTableInfo::CORRELATIVO => 1,
        ]);

        Comprobante::create([
            ComprobanteTableInfo::TIPO_COMPROBANTE => 7,
            ComprobanteTableInfo::SERIE => '20210317',
            ComprobanteTableInfo::CORRELATIVO => 1,
        ]);
    }
}
