<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    public function package(){
        return $this->belongsTo(Packages::class)->withTrashed();
    }

    public function puser(){
        return $this->belongsTo(User::class, 'user_id', 'id')->withTrashed();
    }
}
