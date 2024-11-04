<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppSettings extends Model
{
    use HasFactory;
    
    protected $hidden = [
        'deleted_at',
        'updated_at',
        'created_at',
    ];

    public function getListViewAttribute($value){
        $limit = 10;
        if(!empty($value)){
            $limit = $value;
        }
        return $limit;
    }

    public function getGridViewAttribute($value){
        $limit = 8;
        if(!empty($value)){
            $limit = $value;
        }
        return $limit;
    }

    
}
