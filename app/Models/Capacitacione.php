<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Capacitacione extends Model {
    use HasFactory;

    protected $table = 'capacitaciones';
    protected $fillable = [
        'nombre',
        'descripcion',
        'imagen',
        'user_id',
    ];

}
