<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{

    public function run()
    {
        // Crear los idiomas
        Categoria::create(['nombre' => 'Contabilidad Finaciera']);
        Categoria::create(['nombre' => 'Contabilidad de Costos']);
        Categoria::create(['nombre' => 'Contabilidad Gerencial']);
        Categoria::create(['nombre' => 'Contabilidad Tributaria']);
        Categoria::create(['nombre' => 'Contabilidad Gubernamental']);
        Categoria::create(['nombre' => 'Normas Internacionales de Información Financiera (NIIF)']);
        Categoria::create(['nombre' => 'Contabilidad Forense']);
        Categoria::create(['nombre' => 'Auditoría']);
        Categoria::create(['nombre' => 'Sistemas Contables']);
        Categoria::create(['nombre' => 'Ética y Responsabilidad Social']);
    }
}
