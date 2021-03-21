<?php

namespace Database\Seeders;

use App\Models\Venta;
use App\TableInfo\VentaTableInfo;
use Illuminate\Database\Seeder;

class VentaSeeder extends Seeder
{

    public function run()
    {
        Venta::create([
           VentaTableInfo::EMISOR => 1,
           VentaTableInfo::TIPO_COMPROBANTE => 1,
           VentaTableInfo::COMPROBANTE => 1,
           VentaTableInfo::SERIE => 'F001',
           VentaTableInfo::CORRELATIVO => 2,
           VentaTableInfo::FECHA_EMISION => '2021-03-10',
           VentaTableInfo::TIPO_MONEDA => 1,
           VentaTableInfo::OP_GRAVADAS => 45.00,
           VentaTableInfo::OP_EXONERADAS => 100.00,
           VentaTableInfo::OP_INAFECTAS => 2.50,
           VentaTableInfo::IGV => 8.10,
           VentaTableInfo::TOTAL => 155.60,
           VentaTableInfo::CLIENTE => 2,
           VentaTableInfo::FE_ESTADO => '',
           VentaTableInfo::FE_CODIGO_ERROR => '',
           VentaTableInfo::FE_MENSAJE_SUNAT => '',
           VentaTableInfo::NOMBRE_XML => '',
           VentaTableInfo::XML_BASE64 => '',
           VentaTableInfo::CDR_BASE64 => '',
        ]);
    }
}
