<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call([PaisTableSeeder::class]);
        $this->call([UsersTableSeeder::class]);
        $this->call([RolesTableSeeder::class]);
        $this->call([IdiomasTableSeeder::class]);
        $this->call([CategoriasTableSeeder::class]);
        $this->call([UniversidadesTableSeeder::class]);
    }
}
