<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $hidden = [
        'deleted_at',
        'updated_at',
        'created_at',
        'title',
        'keyword',
    ];

    protected $fillable = [
        'name',
        'icon',
        'description',
        'title',
        'keyword',
    ];

    public function getIconAttribute($value)
    {
       if(!empty($value)){
            return Storage::disk('public')->exists($value) ? Storage::url($value) : Storage::url('icon/default.png');
       }else{
           return  Storage::url('icon/default.png');
       }
        
    }

    public function listing(){
        return $this->hasMany(ListCategory::class);
    }

    public function blog(){
        return $this->hasMany(Blog::class);
    }
}
