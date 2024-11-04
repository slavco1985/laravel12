<?php

namespace App\Models\Business;

use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClaimBusiness extends Model
{
    use HasFactory;

    protected $fillable = ['listing_id', 'user_id'];

    public function listing(){
        return $this->belongsTo(Listing::class)->withTrashed();
    }

    public function user(){
        return $this->belongsTo(User::class)->withTrashed();
    }
    
}
