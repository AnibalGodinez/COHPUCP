<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Crear el usuario
        $user = User::create([
            'name' => 'Administrador',
            'name2' => 'Anibal',
            'apellido' => 'Cohpucp',
            'apellido2' => 'Godinez',
            'numero_identidad' => '0801-1900-15578',
            'numero_colegiacion' => '2010-01-2220',
            'rtn' => '0801-1900-155781',
            'sexo' => 'masculino',
            'fecha_nacimiento' => '1984-06-25',
            'telefono' => '2255-1123',
            'telefono_celular' => '3356-0773',
            'email' => 'anibalgodinez64@gmail.com',
            'estado' => 'activo',
            'password' => Hash::make('Prueba%291'),
        ]);

        // Crear el rol Administrador
        $role = Role::create(['name' => 'Administrador']);

        // Crear los permisos
        $permissions = [
            'ver usuarios',
            'indice usuarios',
            'actualizar usuario',
            'crear usuario',
            'borrar usuario',
            'ver roles',
            'indice roles',
            'actualizar rol',
            'crear rol',
            'eliminar rol',
            'agregar permisos al rol',
            'ver perfil',
            'actualizar perfil',
            'actualizar contraseña perfil',
            'ver permisos',
            'indice permisos',
            'actualizar permiso',
            'crear permiso',
            'borrar permiso',
            'ver boton personas',
            'ver boton roles y permisos',
            'ver boton de invitado',
            'ver boton de agremiado',
            'ver boton mantenimientos',
            'ver boton notificaciones',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Asignar todos los permisos al rol Administrador
        $role->syncPermissions(Permission::all());

        // Asignar el rol Administrador al usuario
        $user->assignRole($role);
    }
}
