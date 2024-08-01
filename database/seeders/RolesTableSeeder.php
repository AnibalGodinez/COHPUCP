<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        Role::create(['name' => 'Agremiado', 'guard_name' => 'web', 'description'=>'El rol Agremiado en la plataforma del Colegio Hondureño de Profesionales Universitarios en Contaduría Pública (COHPUCP), tiene acceso privilegiado a recursos educativos, documentos profesionales y herramientas especializadas. Los miembros pueden realizar gestiones, participar en eventos, actualizar su perfil profesional, entre otras.']);
        Role::create(['name' => 'Invitado', 'guard_name' => 'web', 'description'=>'El rol Invitado en la plataforma del Colegio Hondureño de Profesionales Universitarios en Contaduría Pública (COHPUCP), generalmente tienen el nivel de acceso más básico y limitado. Los invitados suelen tener acceso solo a funciones y contenido públicos del sitio. Sus accesos a la plataforma incluyen navegar por el contenido visible para todos los usuarios, como páginas de inicio, información general, entre otras.']);
    }
}
