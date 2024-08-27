<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NumeroColegiacion extends Model
{
    use HasFactory;

    protected $table = 'numero_colegiacion';

    protected $fillable = ['numero_colegiacion', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
