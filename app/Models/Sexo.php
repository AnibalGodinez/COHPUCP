<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sexo extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    // Relación con el modelo User
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
