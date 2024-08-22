<?php

namespace Database\Seeders;

use App\Models\Sexo;
use Illuminate\Database\Seeder;

class SexosTableSeeder extends Seeder
{
    public function run()
    {
        // Crear los sexos
        Sexo::create(['nombre' => 'Masculino']);
        Sexo::create(['nombre' => 'Femenino']);
    }
}
