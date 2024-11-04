<?php

namespace App\Http\Controllers\Business;

use Inertia\Inertia;
use App\Models\Listing;
use Illuminate\Http\Request;
use App\Services\ClimeService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ClaimController extends Controller
{
    public function newClaimRequest(Request $request){
        $business = Listing::findOrFail($request->business_id);
        if($business->user->role == 'admin'){
            $user = Auth::user()->id;
            ClimeService::saveClimeRequest($business->id, $user);
            return view('pages/other/clime_success');
        }
        
    }


    public function viewClaimRequest(){
        $data['requests'] = ClimeService::getClaimRequests();
        return Inertia::render('Admin/Listing/ClaimRequests',$data);
    }

    public function climeAction(Request $request){
        ClimeService::takeAction($request->id, $request->action);
    }
}
