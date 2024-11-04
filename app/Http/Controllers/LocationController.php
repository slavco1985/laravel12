<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Location;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class LocationController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['location'] = Location::get()->transform(function ($location) {
            return [
                'id' => $location->id,
                'name' => $location->name,
                'image' => $location->image,
                'featured' => $location->featured
            ];
        });
        return Inertia::render('Admin/Location/Manage',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:locations|max:125',
            'image' => 'image|nullable'
        ]);
        $location = new Location();
        if(!empty($request->file('image'))){
            $path = $request->file('image')->store('city', 'public');
            $location->image = $path;
        }
        $location->name = $request->name;
        $location->url = Str::slug($request->name);
        $location->save();
        return Redirect::route('location.create');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
      //  $request->validate(['name' => 'required', Rule::unique('locations')->ignore($location)]);
        $request->validate([
            'name' => 'required|unique:locations,name,'.$location->id,
            'image' => 'image|nullable'
        ]);
        if(!empty($request->file('image'))){
            $path = $request->file('image')->store('city', 'public');
            $location->image = $path;
        }
        $location->name = $request->name;
        $location->url =Str::slug($request->name);
        $location->save();
        return Redirect::route('location.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        $location->delete();
        return Redirect::route('location.create');
    }

    public function update_location_featured(Request $request){
        $location = Location::find($request->id);
        $location->featured = $request->featured;
        $location->update();
        return Redirect::route('location.create',array('fcat'=>$request->fcat));
    }
}
