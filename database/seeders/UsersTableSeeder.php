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
            'email' => 'anibalgodinez64@gmail.com',
            'password' => bcrypt('$2y$10$zrR4KHv2nDcQjSUp6yBq4OqKD1PDjo8fndTK4sGd1YUuKPwfMRqM6'),
            ],

            [
            'name' => 'Johan Anibal',
            'email' => 'johancortez45@gmail.com',
            'password' => bcrypt('$2y$10$zrR4KHv2nDcQjSUp6yBq4OqKD1PDjo8fndTK4sGd1YUuKPwfMRqM6'),
            ]
        ]);
    }
}
