<?php

namespace Database\Seeders;

use App\Models\TipoComprobante;
use App\TableInfo\TipoComprobanteTableInfo;
use Illuminate\Database\Seeder;

class TipoComprobanteSeeder extends Seeder
{

    public function run()
    {
        TipoComprobante::create([
           TipoComprobanteTableInfo::CODIGO => '01',
           TipoComprobanteTableInfo::DESCRIPCION => 'FACTURA',
        ]);

        TipoComprobante::create([
            TipoComprobanteTableInfo::CODIGO => '03',
            TipoComprobanteTableInfo::DESCRIPCION => 'BOLETA',
        ]);

        TipoComprobante::create([
            TipoComprobanteTableInfo::CODIGO => '07',
            TipoComprobanteTableInfo::DESCRIPCION => 'NOTA DE CRÉDITO',
        ]);

        TipoComprobante::create([
            TipoComprobanteTableInfo::CODIGO => '08',
            TipoComprobanteTableInfo::DESCRIPCION => 'NOTA DE DÉBITO',
        ]);

        TipoComprobante::create([
            TipoComprobanteTableInfo::CODIGO => '09',
            TipoComprobanteTableInfo::DESCRIPCION => 'GUÍA DE REMISIÓN',
        ]);

        TipoComprobante::create([
            TipoComprobanteTableInfo::CODIGO => 'RC',
            TipoComprobanteTableInfo::DESCRIPCION => 'RESUMEN DE FACTURAS',
        ]);

        TipoComprobante::create([
            TipoComprobanteTableInfo::CODIGO => 'RA',
            TipoComprobanteTableInfo::DESCRIPCION => 'RESUMEN DE BOLETAS',
        ]);

    }
}
