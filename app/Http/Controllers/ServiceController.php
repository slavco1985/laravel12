<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Listing;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class ServiceController extends Controller
{
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = Gate::inspect('create', [Service::class, $request->lid]);
        if($response->allowed()){
            $request->validate([
                'name' => 'required|max:225',
            ]);
    
            $service = new Service();
            $service->listing_id = $request->lid;
            $service->name = $request->name;
            $service->user_id = Auth::user()->id;
            $service->save();
            return Redirect::route('service.show', $request->lid);
        }else{
            throw ValidationException::withMessages(['limit' => 'You reached your Limit ']);
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show($lid)
    {
        Gate::authorize('view', Listing::find($lid), Listing::class);
        $data['services'] = Service::where('listing_id', $lid)->get();
        $data['lid'] = $lid;
        return Inertia::render('User/Form/Services', $data);
    }

   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        Gate::authorize('update', $service, Service::class);
        $service->name = $request->name;
        $service->update();
        return Redirect::route('service.show', $request->lid);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        Gate::authorize('delete', $service, Service::class);
        $lid = $service->listing_id;
        $service->delete();
        return Redirect::route('service.show', $lid);
    }

    public function getMoreServices($bid, $ofset){
        return Service::where('listing_id', $bid)->limit(6)->offset($ofset*6)->get();
    }
}
