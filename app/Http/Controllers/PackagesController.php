<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Packages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['packages'] = Packages::get();
        return Inertia::render('Admin/Package/Manage',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array();
        $data['current'] = 'dashboard';
        $package = new Packages();
        $package->name = '';
        $package->desic = '';
        $package->price = '';
        $package->listing = 1;
        $package->verification = 'Yes';
        $package->message = 'Allowed';
        $package->review = 'Yes';
        $package->services = 3;
        $package->products = 3;
        $package->images = 3;
        $package->validity = 0;
        $data['packages'] =  $package;
        return Inertia::render('Admin/Package/Add',$data);
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
            'name' => 'required|max:255',
            'desic' => 'required',
            'price' => 'required|numeric',
        ]);

        $package = new Packages();
        $package->name = $request->name;
        $package->desic = $request->desic;
        $package->price = $request->price;
        $package->listing = $request->listing;
        $package->verification = $request->verification;
        $package->message = $request->message;
        $package->review = $request->review;
        $package->services = $request->services;
        $package->products = $request->products;
        $package->images = $request->images;
        $package->validity = $request->validity;
        $package->save();
        return Redirect::route('package.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Packages  $packages
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['current'] = 'dashboard';
        $data['packages'] = Packages::find($id);
        return Inertia::render('Admin/Package/Add',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Packages  $packages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'desic' => 'required',
            'price' => 'required',
        ]);

        $package = Packages::find($id);
        if(!empty($package)){
            $package->name = $request->name;
            $package->desic = $request->desic;
            $package->price = $request->price;
            $package->listing = $request->listing;
            $package->verification = $request->verification;
            $package->message = $request->message;
            $package->review = $request->review;
            $package->services = $request->services;
            $package->products = $request->products;
            $package->images = $request->images;
            $package->validity = $request->validity;
            $package->update();
            return Redirect::route('package.index');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Packages  $packages
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $package =  Packages::find($id);
        $package->delete();
        return Redirect::route('package.index');
    }

    
}
