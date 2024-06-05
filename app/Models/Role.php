<?php

namespace App\Models;

use App\Http\Controllers\RolController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
    ];

     //Relación muchos a muchos (roles-usuarios)
     public function users(){
        return $this->belongsToMany('App\Models\User');
    }

     //Relación muchos a muchos (roles-permisos)
     public function permisos(){
        return $this->belongsToMany('App\Models\Permiso');
    }
}
