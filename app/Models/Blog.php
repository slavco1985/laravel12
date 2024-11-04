<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $hidden = [
        'deleted_at',
        'updated_at',
        'created_at',
    ];

    protected $appends = array('resize','img');

    public function getResizeAttribute($value)
    {
       // return Storage::disk('public')->exists($value);
       if(!empty($this->image)){
            return Storage::disk('public')->exists('blog/resize/'.$this->image) ? Storage::url('blog/resize/'.$this->image) : Storage::url('blog/resize/default.png');
       }else{
           return  Storage::url('blog/resize/default.png');
       }
        
    }
    public function getImgAttribute($value)
    {
       // return Storage::disk('public')->exists($value);
       if(!empty($this->image)){
            return Storage::disk('public')->exists('blog/'.$this->image) ? Storage::url('blog/'.$this->image) : Storage::url('blog/default.png');
       }else{
           return  Storage::url('blog/default.png');
       }
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }   
}
