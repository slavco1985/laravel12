<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessDetail extends Model
{
    use HasFactory;

    protected $hidden = [
        'updated_at',
        'created_at',
    ];


    public function listing(){
        $this->belongsTo(Listing::class)->withTrashed();
    }
}
