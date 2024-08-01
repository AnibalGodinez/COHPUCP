<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashboardContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'layout',
        'title',
        'subtitle',
        'description',

        'pdf',
        'images',
        'videos',

        'links',
        'facebook_link',
        'twitter_link',
        'youtube_link',
        'whatsapp_link',
        'instagram_link',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
