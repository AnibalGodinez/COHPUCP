<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description', 
        'links', 
        'facebook_link', 
        'twitter_link',
        'youtube_link',
        'whatsapp_link',
        'instagram_link',
        'telegram_link',
        'linkendin_link',
        'boton',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
