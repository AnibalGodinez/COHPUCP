<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
            'name' => 'Anibal Godinez',
            'apellido' => 'Godinez Cortez',
            'imagen' => '/imagenes',
            'telefono_casa' => '22356584',
            'telefono_cel' => '98956532',
            'email' => 'anibalgodinez64@gmail.com',
            'rol' => 'administrador',
            'estado' => 'activo',
            'password' => bcrypt('$2y$10$zrR4KHv2nDcQjSUp6yBq4OqKD1PDjo8fndTK4sGd1YUuKPwfMRqM6'),
            ],

            [
            'name' => 'Johan Anibal',
            'apellido' => 'Cortez Godinez',
            'telefono_casa' => '22225544',
            'telefono_cel' => '99856632',
            'email' => 'johancortez45@gmail.com',
            'rol' => 'usuario',
            'estado' => 'activo',
            'password' => bcrypt('$2y$10$zrR4KHv2nDcQjSUp6yBq4OqKD1PDjo8fndTK4sGd1YUuKPwfMRqM6'),
            ]
        ]);
    }
}
