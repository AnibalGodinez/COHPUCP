<?php

namespace Database\Seeders;

use App\Models\Universidad;
use Illuminate\Database\Seeder;

class UniversidadesTableSeeder extends Seeder
{
    public function run()
    {
        // Crear las universidades
        Universidad::create(['nombre_universidad' => 'Universidad Nacional Autónoma de Honduras (UNAH)']);
        Universidad::create(['nombre_universidad' => 'Universidad Tecnológica de Honduras (UTH)']);
        Universidad::create(['nombre_universidad' => 'Centro Universitario Tecnológico (CEUTEC)']);
        Universidad::create(['nombre_universidad' => 'Universidad Tecnológica Centroamericana (UNITEC)']);

    }
}
