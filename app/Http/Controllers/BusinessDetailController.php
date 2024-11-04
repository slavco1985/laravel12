<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Listing;
use Illuminate\Http\Request;
use App\Models\BusinessDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;


class BusinessDetailController extends Controller
{
   
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BusinessDetail  $businessDetail
     * @return \Illuminate\Http\Response
     */
    public function show($lid)
    {       
      // $response = Gate::inspect('view', $listing, Listing::class);
       Gate::authorize('view', Listing::find($lid), Listing::class);
        $detail = BusinessDetail::where('listing_id', $lid)->firstOrNew();
        $data['about'] = json_decode($detail->about);
        $data['lid'] = $lid;
        return Inertia::render('User/Form/Business', $data);
    }

   
    public function store(Request $request)
    {
        Gate::authorize('view', Listing::find($request->lid), Listing::class);
        $bd = BusinessDetail::where('listing_id', $request->lid)->firstOrNew();
        $bd->about = json_encode($request->data);
        $bd->user_id = Auth::user()->id;
        $bd->listing_id = $request->lid;
        $bd->save();
        return Redirect::route('service.show', $request->lid);
    }

  
}
