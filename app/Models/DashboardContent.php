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
        'bar_charts',
        'pie_charts',
        'data_tables',
        'task_lists',
        'pdf_files',
        'documents',
        'internal_links',
        'external_links',
        'images',
        'videos',
        'calendars',
        'maps',
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
