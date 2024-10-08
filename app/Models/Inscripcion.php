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
        'municipio_realiza_solicitud',

        // II. Datos Profesionales
        'fecha_graduacion',
        'universidad',
        'nombre_empresa_trabajo_actual',
        'cargo',
        'direccion_empresa',
        'correo_empresa',
        'telefono_empresa',
        'extension_telefono_empresa',

        // III. Información Adicional
        'especialidad_1',
        'lugar_especialidad_1',
        'fecha_especialidad_1',

        'especialidad_2',
        'lugar_especialidad_2',
        'fecha_especialidad_2',

        // IV. Cursos de especialización
        'nombre_curso_especializacion',
        'lugar_curso',
        'fecha_curso',
       
        // V. Experiencia Profesional
        'nombre_empresa1',
        'cargo_empresa1',
        'duración_empresa1',

        'nombre_empresa2',
        'cargo_empresa2',
        'duración_empresa2',

        // VI. Misiones Desempeñadas
        'comisiones',
        'representaciones',
        'delegaciones',

        // VII. Otros
        'publicacion_documentos',
        'publicaciones',
        'publicacion_libro',

        // VIII. Documentos
        'imagen_titulo',
        'imagen_dni',
        'imagen_tamano_carnet',
        'cv',
        'imagen_dni_beneficiario1',
        'imagen_dni_beneficiario2',
        'imagen_dni_beneficiario3',
        'imagen_rtn',
        'imagen_firma_solicitante',

        // IX. Estado de la inscripción
        'estado',
        'descripcion_estado_solicitud',
    ];

    // Castear todas las imágenes como un array
    protected $casts = [
        'imagen_titulo' => 'array',
        'imagen_dni' => 'array',
        'imagen_tamano_carnet' => 'array',
        'imagen_dni_beneficiario1' => 'array',
        'imagen_dni_beneficiario2' => 'array',
        'imagen_dni_beneficiario3' => 'array',
        'imagen_rtn' => 'array',
    ];


    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
