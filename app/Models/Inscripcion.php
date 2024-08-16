<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    use HasFactory;

    protected $table = 'inscripciones';

    protected $fillable = [
        'user_id',
        'fecha_inscripcion',

        // I. Datos Personales
        'name',
        'name2',
        'apellido',
        'apellido2',
        'numero_identidad',
        'fecha_nacimiento',
        'lugar_nacimiento',
        'direccion_residencia',
        'telefono',
        'telefono_celular',
        'email',

        // II. Datos Profesionales
        'fecha_graduacion',
        'universidad',
        'nombre_empresa_trabajo_actual',
        'cargo',
        'direccion_empresa',
        'correo_empresa',
        'telefono_empresa',
        'extension_telefono_empresa',

        // VIII. Documentos
        'imagen_titulo',
        'cv',
    ];

    // Castear imagen_titulo como array
    protected $casts = [
        'imagen_titulo' => 'array',
    ];

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
