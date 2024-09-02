<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InscripcionFirma extends Model
{
    use HasFactory;

    // La tabla asociada con el modelo
    protected $table = 'inscripcion_firmas';

    // Los atributos que son asignables en masa
    protected $fillable = [
        'user_id',
        'fecha_inscripcion',

        // I. Datos de la sociedad
        'nombre_sociedad',
        'num_inscripcion_registro_publico_comercio',
        'fecha_constitucion',
        'registro_tributario_nacional',
        'num_inscripcion_camara_comercio',
        'direccion',
        'telefono',
        'celular',
        'email',
        
        // II. Datos de la socios
        'primer_nombre_socio1',
        'segundo_nombre_socio1',
        'primer_apellido_socio1',
        'segundo_apellido_socio1',
        'num_colegiacion_socio1',
        'imagen_firma_socio1',

        'primer_nombre_socio2',
        'segundo_nombre_socio2',
        'primer_apellido_socio2',
        'segundo_apellido_socio2',
        'num_colegiacion_socio2',
        'imagen_firma_socio2',

        'primer_nombre_socio3',
        'segundo_nombre_socio3',
        'primer_apellido_socio3',
        'segundo_apellido_socio3',
        'num_colegiacion_socio3',
        'imagen_firma_socio3',

        'imagen_firma_social',
        'imagen_firma_representante_legal',

        // III. Estado de la inscripción
        'estado',
        'descripcion_estado_solicitud',
    ];

    // Castear todas las imágenes como un array
    protected $casts = [
        'imagen_firma_socio1' => 'array',
        'imagen_firma_socio2' => 'array',
        'imagen_firma_socio3' => 'array',
        'imagen_firma_social' => 'array',
        'imagen_firma_representante_legal' => 'array',
    ];

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
