<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Http\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $hidden = [
        'deleted_at',
        'updated_at',
        'created_at',
    ];

    protected $appends = array('availability');


    public function getImageAttribute($value)
    {
       // return Storage::disk('public')->exists($value);

       if(!empty($value)){
            return Storage::disk('public')->exists($value) ? Storage::url($value) : Storage::url('city/default.png');
       }else{
           return  Storage::url('city/default.png');
       }
        
    }

    public function listings(){
        return $this->hasMany(Listing::class)->withTrashed();;
    }
    

    public function getAvailabilityAttribute()
    {
        return 'yes';
    }


}
