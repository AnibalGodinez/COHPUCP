<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Universidad extends Model
{
    use HasFactory;

    protected $table = 'universidades';

    protected $fillable = [
        'nombre_universidad',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'universidad_user');
    }
}
