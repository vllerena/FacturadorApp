<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            TipoAfectacionSeeder::class,
            TipoComprobanteSeeder::class,
            TipoDocumentoSeeder::class,
            TipoMonedaSeeder::class,
            TipoUnidadSeeder::class,
            TablaParametricaSeeder::class,
            EmisorSeeder::class,
            ClienteSeeder::class,
            ProductoSeeder::class,
            ComprobanteSeeder::class,
            VentaSeeder::class,
            VentaDetalleSeeder::class,
            UserSeeder::class,
        ]);
    }
}
