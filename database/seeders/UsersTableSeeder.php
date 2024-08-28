<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Sexo;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Obtener los IDs de los sexos
        $sexoMasculino = Sexo::where('nombre', 'Masculino')->first()->id;
        $sexoFemenino = Sexo::where('nombre', 'Femenino')->first()->id;

        // Crear el usuario
        $user = User::create([
            'name' => 'Anibal',
            'name2' => 'Johan',
            'apellido' => 'Godinez',
            'apellido2' => 'Cortez',
            'numero_identidad' => '0801-1984-15578',
            'numero_colegiacion' => '2010-01-2220',
            'rtn' => '0801-1984-155781',
            'sexo_id' => 1,
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
                'name' => 'Johan',
                'name2' => 'Anibal',
                'apellido' => 'Cortez',
                'apellido2' => 'Godinez',
                'numero_identidad' => '0901-1985-12345',
                'rtn' => '0901-1985-123451',
                'sexo_id' => 1,
                'fecha_nacimiento' => '1985-07-10',
                'telefono' => '2456-7890',
                'telefono_celular' => '3456-7890',
                'email' => 'johan_godinez@yahoo.com',
                'estado' => 'activo',
                'password' => Hash::make('Prueba%292'),
            ],
            [
                'name' => 'Carlos',
                'name2' => 'Alberto',
                'apellido' => 'Pavón',
                'apellido2' => 'Plummer',
                'numero_identidad' => '0901-1978-32114',
                'rtn' => '0901-1978-321145',
                'sexo_id' => 1,
                'fecha_nacimiento' => '1978-02-07',
                'telefono' => '2456-1122',
                'telefono_celular' => '9955-7890',
                'email' => 'carlospavon@gmail.com',
                'estado' => 'activo',
                'password' => Hash::make('Prueba%293'),
            ],
            [
                'name' => 'Marisa',
                'name2' => 'Elizabeth',
                'apellido' => 'Pineda',
                'apellido2' => 'Pavón',
                'numero_identidad' => '0801-1998-55148',
                'rtn' => '0801-1998-551489',
                'sexo_id' => 2,
                'fecha_nacimiento' => '1998-04-02',
                'telefono' => '2277-7840',
                'telefono_celular' => '9931-7530',
                'email' => 'marisapineda@gmail.com',
                'estado' => 'activo',
                'password' => Hash::make('Prueba%294'),
            ],
        ];

        foreach ($users as $userData) {
            User::create($userData);
        }
    }
}
