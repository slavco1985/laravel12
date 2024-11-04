<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'deleted_at',
        'updated_at',
        'state',
        'role',
        'pincode',
        'image',
        'img',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = array('resize','img');

    public function plan(){
        return $this->hasOne(UserPackage::class);
    }

    public function getResizeAttribute($value)
    {
       // return Storage::disk('public')->exists($value);

       if(!empty($this->image)){
            return Storage::disk('public')->exists('user/resize/'.$this->image) ? Storage::url('user/resize/'.$this->image) : Storage::url('user/resize/default.png');
       }else{
           return  Storage::url('user/resize/default.png');
       }
        
    }
    public function getImgAttribute($value)
    {
       // return Storage::disk('public')->exists($value);

       if(!empty($this->image)){
            return Storage::disk('public')->exists('user/'.$this->image) ? Storage::url('user/'.$this->image) : Storage::url('user/default.png');
       }else{
           return  Storage::url('user/default.png');
       }
        
    }


}
