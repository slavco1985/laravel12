<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Listing;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = Gate::inspect('create', [Product::class, $request->lid]);
        if($response->allowed()){
            $request->validate([
                'name' => 'required|unique:locations|max:125',
                'image' => 'image|nullable',
                'price' => 'required|numeric'
            ]);
            $product = new Product();
            if(!empty($request->file('image'))){
                $path = $request->file('image')->store('product', 'public');
                $product->image = $path;
            }
            $product->name = $request->name;
            $product->user_id = Auth::user()->id;
            $product->listing_id = $request->lid;
            $product->price = $request->price;
            $product->save();
            return Redirect::route('product.show', $request->lid);
        }else{
            throw ValidationException::withMessages(['limit' => 'You reached your Limit ']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($lid)
    {
        Gate::authorize('view', Listing::find($lid), Listing::class);
        $data['product'] = Product::where('listing_id', $lid)->get();
        $data['lid'] = $lid;
        return Inertia::render('User/Form/Products', $data);
    }

  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        Gate::authorize('update', $product, Product::class);
        $request->validate([
            'name' => 'required|unique:locations|max:125',
            'image' => 'image|nullable',
            'price' => 'required|numeric'
        ]);
        if(!empty($request->file('image'))){
            $path = $request->file('image')->store('product', 'public');
            $product->image = $path;
        }
        $product->name = $request->name;
        $product->price = $request->price;
        $product->update();
        return Redirect::route('product.show', $product->listing_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Gate::authorize('update', $product, Product::class);
        $product->delete();
        return Redirect::route('product.show', $product->listing_id);
    }

    

    public function getMoreProducts($bid, $ofset){
        return Product::where('listing_id', $bid)->limit(6)->offset($ofset*6)->get();
    }
}
