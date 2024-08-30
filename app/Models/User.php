<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\MyResetPassword;
use App\Notifications\VerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
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
        'sexo_id', 
        'fecha_nacimiento',
        'telefono',
        'telefono_celular',
        'email',
        'estado',
        'password',
        'pais_id',
        'profile_image',
        'facebook_link',
        'instagram_link',
        'linkedin_link',
        'twitter_link',
        'bio'
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

    public function markEmailAsVerified()
    {
        return $this->forceFill([
            'email_verified_at' => $this->freshTimestamp(),
        ])->save();
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MyResetPassword($token));
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail);
    }

    public function welcomeContents()
    {
        return $this->hasMany(WelcomeContent::class);
    }

    // Relación muchos a muchos con universidades
    public function universidad()
    {
        return $this->belongsToMany(Universidad::class, 'universidad_id');
    }

    // Relación muchos a muchos con universidades
    public function pais()
    {
        return $this->belongsTo(Pais::class, 'pais_id'); 
    }

    // Relación con el modelo Sexo
    public function sexo()
    {
        return $this->belongsTo(Sexo::class);
    }

    public function numeroColegiacion()
    {
        return $this->hasOne(NumeroColegiacion::class);
    }

}
