<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Notifications\MyResetPassword;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'name2',
        'apellido',
        'apellido2',
        'numero_identidad',
        'numero_colegiacion',
        'rtn',
        'sexo',
        'fecha_nacimiento',
        'telefono',
        'telefono_celular',
        'email',
        'password',
        'pais_id', // Añadir pais_id a los campos rellenables
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isActive()
    {
        return $this->estado === 'activo';
    }

    public function findForPassport($username)
    {
        return $this->orWhere('email', $username)->orWhere('numero_colegiacion', $username)->first();
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function pais()
    {
        return $this->belongsTo(Pais::class, 'pais_id'); 
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MyResetPassword($token));
    }

}