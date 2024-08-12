<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha_solicitud',

        // I. Datos Personales 
        'primer_nombre', 
        'segundo_nombre', 
        'primer_apellido',
        'segundo_apellido', 
        'dni', 
        'lugar_nacimiento', 
        'fecha_nacimiento', 
        'direccion_residencia',
        'telefono_fijo', 
        'correo_electronico', 
        'celular',

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

        // Cursos de especialización
        'nombre_curso_especializacion', 
        'lugar_curso', 
        'fecha_curso',
        
        // IV. Experiencia Profesional
        'nombre_empresa1',
        'cargo_empresa1',
        'duración_empresa1',

        'nombre_empresa2',
        'cargo_empresa2',
        'duración_empresa2',

        // V. Misiones Desempeñadas
        'comisiones',
        'representaciones',
        'delegaciones',

        // Extras
        'publicacion_documentos',
        'publicaciones',
        'publicacion_libro',
        'otros',

        // Archivos y documentos
        'imagen_titulo_original', 
        'imagen_dni', 
        'imagen_tamano_carnet',
        'pdf_curriculum_vitae', 
        'imagen_dni_beneficiario1', 
        'imagen_dni_beneficiario2', 
        'imagen_rtn',
        'estado',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
