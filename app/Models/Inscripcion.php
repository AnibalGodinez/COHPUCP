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
        'name',
        'numero_identidad',
        'email',
        'universidad',
        'fecha_inscripcion',
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
