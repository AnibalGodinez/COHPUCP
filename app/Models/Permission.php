<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasPermission;

class Permission extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description'
    ];
}
