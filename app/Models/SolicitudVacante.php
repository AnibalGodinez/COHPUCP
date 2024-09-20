<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudVacante extends Model
{
    use HasFactory;

    protected $table = 'solicitudes_vacantes';

    protected $fillable = [
        'user_id',
        'nombre_empresa',
        'nombre_vacante',
        'descripcion',
        'responsabilidades',
        'requisitos',
        'experiencia',
        'tiempo',
        'ubicacion',
        'correo',
        'telefono',
        'celular',
        'enlace',
        'estado',
    ];

    // Relación con el usuario que crea la solicitud
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
