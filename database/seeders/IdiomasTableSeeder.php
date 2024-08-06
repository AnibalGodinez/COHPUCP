<?php

namespace Database\Seeders;

use App\Models\Idioma;
use Illuminate\Database\Seeder;

class IdiomasTableSeeder extends Seeder
{
    public function run()
    {
        // Crear los idiomas
        Idioma::create(['nombre' => 'Español']);
        Idioma::create(['nombre' => 'Inglés']);
        Idioma::create(['nombre' => 'Fránces']);
        Idioma::create(['nombre' => 'Alemán']);
        Idioma::create(['nombre' => 'Italiano']);
        Idioma::create(['nombre' => 'Portugués']);
        Idioma::create(['nombre' => 'Árabe']);
        Idioma::create(['nombre' => 'Ruso']);
    }
}
