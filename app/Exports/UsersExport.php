<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return User::select(
            'users.id', 
            \DB::raw("CONCAT(users.name, ' ', users.name2, ' ', users.apellido, ' ', users.apellido2) AS nombre_completo"),
            'users.numero_identidad', 
            'users.numero_colegiacion', 
            'users.rtn', 
            'sexos.nombre as sexo', 
            'users.fecha_nacimiento', 
            \DB::raw('YEAR(CURDATE()) - YEAR(users.fecha_nacimiento) AS edad'),
            'pais.nombre as pais',
            \DB::raw("CONCAT(pais.codigo, ' ', users.telefono) AS telefono"),
            \DB::raw("CONCAT(pais.codigo, ' ', users.telefono_celular) AS telefono_celular"),
            'users.email', 
            'users.estado'
        )
        ->leftJoin('sexos', 'users.sexo_id', '=', 'sexos.id')
        ->leftJoin('pais', 'users.pais_id', '=', 'pais.id')  // Cambiar aquí si es necesario
        ->get();
    }

    public function headings(): array
    {
        return [
            'ID', 
            'Nombre completo', 
            'DNI', 
            'Nº colegiación', 
            'RTN', 
            'Sexo', 
            'Fecha de nacimiento', 
            'Edad', 
            'País', 
            'Teléfono', 
            'Teléfono celular', 
            'Correo electrónico', 
            'Estado'
        ];
    }
}
