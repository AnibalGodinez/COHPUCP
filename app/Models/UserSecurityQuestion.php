<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSecurityQuestion extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'security_question_id', 'answer'];

    public function question()
    {
        return $this->belongsTo(SecurityQuestion::class, 'security_question_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
