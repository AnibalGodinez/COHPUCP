<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = [
        'layout',
        'titulo',
        'nombre',
        'descripcion',
        'precio',
        'enlace',
        'icono',
        'calificacion',
        'idioma_id',
        'categoria_id',
        'user_id',
        'imagen',
    ];

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con el modelo Idioma
    public function idioma()
    {
        return $this->belongsTo(Idioma::class);
    }

    // Relación con el modelo Categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
