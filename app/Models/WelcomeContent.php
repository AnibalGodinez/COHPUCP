<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WelcomeContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'layout',
        'title', 
        'description', 
        'image_path', 
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
