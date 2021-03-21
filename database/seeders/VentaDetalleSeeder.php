<?php

namespace Database\Seeders;

use App\Models\VentaDetalle;
use App\TableInfo\VentaDetalleTableInfo;
use Illuminate\Database\Seeder;

class VentaDetalleSeeder extends Seeder
{

    public function run()
    {
        VentaDetalle::create([
            VentaDetalleTableInfo::VENTA => 1,
            VentaDetalleTableInfo::ITEM => 1,
            VentaDetalleTableInfo::PRODUCTO => 3,
            VentaDetalleTableInfo::CANTIDAD => 9.00,
            VentaDetalleTableInfo::VALOR_UNITARIO => 5.00,
            VentaDetalleTableInfo::PRECIO_UNITARIO => 5.90,
            VentaDetalleTableInfo::IGV => 8.10,
            VentaDetalleTableInfo::PORCENTAJE_IGV => 18.00,
            VentaDetalleTableInfo::VALOR_TOTAL => 45.00,
            VentaDetalleTableInfo::IMPORTE_TOTAL => 53.10,
        ]);

        VentaDetalle::create([
            VentaDetalleTableInfo::VENTA => 1,
            VentaDetalleTableInfo::ITEM => 2,
            VentaDetalleTableInfo::PRODUCTO => 6,
            VentaDetalleTableInfo::CANTIDAD => 1.00,
            VentaDetalleTableInfo::VALOR_UNITARIO => 100.00,
            VentaDetalleTableInfo::PRECIO_UNITARIO => 100.90,
            VentaDetalleTableInfo::IGV => 0.00,
            VentaDetalleTableInfo::PORCENTAJE_IGV => 18.00,
            VentaDetalleTableInfo::VALOR_TOTAL => 100.00,
            VentaDetalleTableInfo::IMPORTE_TOTAL => 100.00,
        ]);

        VentaDetalle::create([
            VentaDetalleTableInfo::VENTA => 1,
            VentaDetalleTableInfo::ITEM => 3,
            VentaDetalleTableInfo::PRODUCTO => 8,
            VentaDetalleTableInfo::CANTIDAD => 1.00,
            VentaDetalleTableInfo::VALOR_UNITARIO => 2.50,
            VentaDetalleTableInfo::PRECIO_UNITARIO => 2.50,
            VentaDetalleTableInfo::IGV => 0.00,
            VentaDetalleTableInfo::PORCENTAJE_IGV => 18.00,
            VentaDetalleTableInfo::VALOR_TOTAL => 2.50,
            VentaDetalleTableInfo::IMPORTE_TOTAL => 2.50,
        ]);
    }
}
