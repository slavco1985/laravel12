<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Gallery;
use App\Models\Listing;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function getMoreGallery($bid, $ofset){
        return Gallery::where('listing_id', $bid)->limit(4)->offset($ofset*4)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = Gate::inspect('create', [Gallery::class, $request->lid]);
        if($response->allowed()){
            $request->validate([
                'image' => 'image|required',
            ]);
            $gallery = new Gallery();
            if(!empty($request->file('image'))){
                $path = $request->file('image')->store('gallery', 'public');
                $gallery->image = $path;
                $gallery->user_id = Auth::user()->id;
                $gallery->listing_id = $request->lid;
                $gallery->save();
            }
            return Redirect::route('gallery.show', $request->lid);
        }else{
            throw ValidationException::withMessages(['limit' => 'You reached your Limit ']);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show($lid)
    {
        Gate::authorize('view', Listing::find($lid), Listing::class);
        $data['gallery'] = Gallery::where('listing_id', $lid)->get();
        $data['lid'] = $lid;
        return Inertia::render('User/Form/Gallery', $data);
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return Redirect::route('gallery.show', $gallery->listing_id);
    }
}
