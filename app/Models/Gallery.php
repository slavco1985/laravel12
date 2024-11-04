<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gallery extends Model
{
    use HasFactory;

    protected $hidden = [
        'updated_at',
        'created_at',
    ];

    public function getImageAttribute($value)
    {
       // return Storage::disk('public')->exists($value);

       if(!empty($value)){
            return Storage::disk('public')->exists($value) ? Storage::url($value) : Storage::url('product/default.png');
       }else{
           return  Storage::url('product/default.png');
       }
        
    }
}
