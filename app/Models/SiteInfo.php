<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class SiteInfo extends Model
{
    use HasFactory;

    protected $hidden = [
        'deleted_at',
        'updated_at',
        'created_at',
    ];
    
}
