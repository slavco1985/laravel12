<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rating extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $hidden = [
        'deleted_at',
        'updated_at',
        'created_at',
    ];

    public function user(){
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function listing(){
        return $this->belongsTo(Listing::class)->withTrashed();
    }
}
