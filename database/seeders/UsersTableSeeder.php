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
            'numero_identidad' => '0801-1984-15578',
            'numero_colegiacion' => '2010-01-2220',
            'rtn' => '0801-1984-155781',
            'sexo' => 'masculino',
            'fecha_nacimiento' => '1984-06-25',
            'telefono' => '2255-1123',
            'telefono_celular' => '3356-0773',
            'email' => 'anibalgodinez64@gmail.com',
            'estado' => 'activo',
            'password' => Hash::make('Prueba%291'),
        ]);

        // Crear el rol Administrador con descripción
        $role = Role::create([
            'name' => 'Administrador',
            'guard_name' => 'web',
            'description' => 'El rol Administrador en la plataforma del Colegio Hondureño de Profesionales Universitarios en Contaduría Pública (COHPUCP), tiene el acceso completo a todas las funciones y datos del sistema. Los administradores pueden gestionar usuarios, configurar el sitio y realizar cualquier acción necesaria para mantener optimizada la plataforma.',
        ]);

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
            'indice contenido inicio',
            'actualizar contenido inicio',
            'crear contenido inicio',
            'borrar contenido inicio',
            'indice preguntas de seguridad',
            'actualizar preguntas de seguridad',
            'crear preguntas de seguridad',
            'borrar preguntas de seguridad',
            'ver opciones de recuperacion contaseña',
            'ver preguntas de seguridad',
            'ver perfil',
            'actualizar perfil',
            'cambiar contraseña',
            'ver paises',
            'indice paises',
            'actualizar pais',
            'crear pais',
            'borrar pais',
            'indice idiomas',
            'actualizar idioma',
            'crear idioma',
            'borrar idioma',
            'indice contenido dasboard',
            'actualizar contenido dasboard',
            'crear contenido dasboard',
            'borrar contenido dasboard',
            'ver cursos',
            'indice cursos',
            'actualizar cursos',
            'crear cursos',
            'borrar cursos',
            'indice categorias',
            'actualizar categorias',
            'crear categorias',
            'borrar categorias',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Asignar todos los permisos al rol Administrador
        $role->syncPermissions(Permission::all());

        // Asignar el rol Administrador al usuario
        $user->assignRole($role);

        // Crear usuarios de prueba
        $users = [
            [
                'name' => 'Juan',
                'name2' => 'Carlos',
                'apellido' => 'Perez',
                'apellido2' => 'Martinez',
                'numero_identidad' => '0901-1985-12345',
                'numero_colegiacion' => '2020-02-3344',
                'rtn' => '0901-1985-123451',
                'sexo' => 'masculino',
                'fecha_nacimiento' => '1985-07-10',
                'telefono' => '2456-7890',
                'telefono_celular' => '3456-7890',
                'email' => 'juancarlos@example.com',
                'estado' => 'activo',
                'password' => Hash::make('Test%1234'),
            ],
            [
                'name' => 'Maria',
                'name2' => 'Fernanda',
                'apellido' => 'Lopez',
                'apellido2' => 'Hernandez',
                'numero_identidad' => '0102-1990-67890',
                'numero_colegiacion' => '2021-03-4455',
                'rtn' => '0102-1990-678901',
                'sexo' => 'femenino',
                'fecha_nacimiento' => '1990-12-15',
                'telefono' => '2567-8901',
                'telefono_celular' => '4567-8901',
                'email' => 'mariafernanda@example.com',
                'estado' => 'activo',
                'password' => Hash::make('Test%5678'),
            ],
            [
                'name' => 'Pedro',
                'name2' => 'Antonio',
                'apellido' => 'García',
                'apellido2' => 'Morales',
                'numero_identidad' => '0203-1995-54321',
                'numero_colegiacion' => '2022-04-5566',
                'rtn' => '0203-1995-543210',
                'sexo' => 'masculino',
                'fecha_nacimiento' => '1995-03-20',
                'telefono' => '2678-9012',
                'telefono_celular' => '5678-9012',
                'email' => 'pedroantonio@example.com',
                'estado' => 'activo',
                'password' => Hash::make('Test%6789'),
            ],
            [
                'name' => 'Ana',
                'name2' => 'Maria',
                'apellido' => 'Santos',
                'apellido2' => 'Castro',
                'numero_identidad' => '0304-1992-87654',
                'numero_colegiacion' => '2023-05-6677',
                'rtn' => '0304-1992-876543',
                'sexo' => 'femenino',
                'fecha_nacimiento' => '1992-11-05',
                'telefono' => '2789-0123',
                'telefono_celular' => '6789-0123',
                'email' => 'anamaria@example.com',
                'estado' => 'activo',
                'password' => Hash::make('Test%7890'),
            ],
        ];

        foreach ($users as $userData) {
            User::create($userData);
        }
    }
}
