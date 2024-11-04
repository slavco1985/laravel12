<?php
namespace App\Services;

use App\Models\Listing;
use App\Models\Business\ClaimBusiness;

class  ClimeService
{   
    public static function saveClimeRequest($business_id, $user)
    {
       ClaimBusiness::updateOrCreate(['listing_id' => $business_id, 'user_id' => $user]);
    }

    public static function getClaimRequests(){
        return ClaimBusiness::paginate(10)->through(function($c){
            return [
                'id' => $c->id,
                'listing_id' => $c->listing_id,
                'user_id' => $c->user_id,
                'business_name' => $c->listing->business_name,
                'business_image' => $c->listing->resize,
                'user_name' => $c->user->name,
                'user_mobile' => $c->user->mobile,
                'user_email' => $c->user->email,
                'status' => $c->status,
            ];
        });
    }

    public static function takeAction($id, $action){
      
        $request = ClaimBusiness::findOrFail($id);
        $request->status = $action;
        $request->save();

        if($action == 'Approved'){
            $business = Listing::findOrFail($request->listing_id);
            $business->user_id = $request->user_id;
            $business->save();
        }
       
    }
}