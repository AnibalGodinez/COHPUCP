<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
        public function run()
    {
        Role::create(['id' => 1, 'nombre' => 'Administrador', 'descripcion' => 'Administrador del sistema']);
        Role::create(['id' => 2, 'nombre' => 'Usuario', 'descripcion' => 'Usuario regular']);
    }
}

