<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Universidad extends Model
{
    use HasFactory;

    protected $table = 'universidades';

    protected $fillable = ['nombre_universidad'];

    // Relación con el modelo User
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
