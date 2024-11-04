<?php

namespace App\Models;

use App\Models\Bookmark;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Listing extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $hidden = [
        'deleted_at',
        'updated_at',
        'created_at',
    ];

    protected $fillable = [
        'user_id', 'business_name', 'image', 'url', 'description', 'location_id', 'email', 'website', 'mobile', 'address',
    ];

    protected $appends = array('resize','img', 'firstcat');

    public function selected(){
       return $this->hasMany(ListCategory::class);
    }

    public function getResizeAttribute($value)
    {
       // return Storage::disk('public')->exists($value);
       if(!empty($this->image)){
            return Storage::disk('public')->exists('business/resize/'.$this->image) ? Storage::url('business/resize/'.$this->image) : Storage::url('business/resize/default.png');
       }else{
           return  Storage::url('business/resize/default.png');
       }
        
    }
    public function getImgAttribute($value)
    {
       // return Storage::disk('public')->exists($value);
       if(!empty($this->image)){
            return Storage::disk('public')->exists('business/'.$this->image) ? Storage::url('business/'.$this->image) : Storage::url('business/default.png');
       }else{
           return  Storage::url('business/default.png');
       }
        
    }

    public function city(){
        return $this->belongsTo(Location::class, 'location_id')->withTrashed();;
    }   

    public function user(){
        return $this->belongsTo(User::class)->withTrashed();;
    }

    public function getFirstcatAttribute(){
        return $this->select;
    }

    public function getLikeAttribute(){
        if(Auth::check()){
            $uid = Auth::user()->id;
            return Bookmark::where('listing_id', $this->id)->where('user_id', $uid)->count();
        }else{
            return 0;
        }
        
    }

    public function getRcountAttribute(){
       return Rating::where('listing_id', $this->id)->count();
    }
}
