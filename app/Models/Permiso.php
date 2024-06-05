<?php

namespace App\Models;

use App\Http\Controllers\PermisosController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    use HasFactory;
     //Relación muchos a muchos (permisos-roles)
     public function roles(){
        return $this->belongsToMany('App\Models\Role');
    }
}

