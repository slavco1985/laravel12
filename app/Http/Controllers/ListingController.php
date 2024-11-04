<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Listing;
use App\Models\Category;
use App\Models\Location;
use App\Models\Packages;
use App\Models\UserPackage;
use Illuminate\Support\Str;
use App\Models\ListCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request as Qrequest;

class ListingController extends Controller
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

    public function viewAllListings(Request $request){
        $data['request'] = $request;
       // $data['listing'] = //Listing::where('location_id', $request->fcity)->get();
        $query = Listing::query();
        if(!empty($request->fcat)){
            $query = $query->whereRelation('selected', 'category_id', $request->fcat);
        }
        if(!empty($request->frating)){
            $query->whereBetween('rating', [$request->frating.'.1', $request->frating.'.9']);
        }
        if(!empty($request->fcity)){
            $query->where('location_id', $request->fcity);
        }
        if(!empty($request->fkey)){
            $query->where('business_name', 'like', $request->fkey.'%');
        }
        $query->orderBy('id', 'desc');
        $data['listing'] = $query->paginate(10)->appends(Qrequest::all())->through(function ($list) {
            return [
                'id' => $list->id,
                'business_name' => $list->business_name,
                'url' => $list->url,
                'image' => $list->resize,
                'email' => $list->email,
                'city' => $list->city->name,
                'user' => $list->user->name,
                'rating' => $list->rating,
                'plan' => ($list->user->plan) ? $list->user->plan->package->name : '',
                'featured' => $list->featured
            ];
        });
        
        $data['category'] = Category::select('id', 'name')->get();
        $data['update'] = session('update');
        $data['city'] = Location::select('id', 'name')->get();
        return Inertia::render('Admin/Listing/All',$data);
    }
    


    public function viewTrashListings(Request $request){
        $data['listing'] = Listing::onlyTrashed()->paginate(10)->appends(Qrequest::all())->through(function ($list) {
            return [
                'id' => $list->id,
                'business_name' => $list->business_name,
                'url' => $list->url,
                'image' => $list->image,
                'email' => $list->email,
                'city' => $list->city->name,
                'user' => $list->user->name,
                'rating' => $list->rating,
                'plan' => ($list->user->plan) ? $list->user->plan->package->name : '',
                'featured' => $list->featured
            ];
        });
        return Inertia::render('Admin/Trashed/Listing',$data);
    }

    public function bulkImport(){
        $data['category'] = Category::get();
        $data['business'] = Listing::get();
        return Inertia::render('Admin/Import/Business', $data);
    }


    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Gate::inspect('create', Listing::class);
        //$this->authorize('create', Listing::class);
       if($response->allowed()){
            $data = array();
            $data['category'] = Category::get()->map(function($category){
                return [
                    'id' => $category->id,
                    'label' => $category->name,
                    'value' => $category->id,
                    'disabled' => 0
                ];
            });
            $data['location'] = Location::get(); 
            $listing = new Listing();
            $data['listing'] = $listing;
            $data['typ'] = 'add';
            return Inertia::render('User/NewListing', $data);
       }else{
           $message = $response->message(); 
           if($message != 'new'){
                return Inertia::render('User/Alerts/ListingLimit');
           }else{
               return Redirect::route('choos-package');
           }
            
       }
        
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
            'business_name' => 'required|unique:listings|max:125',
            'description' => 'required|min:50',
            'category' => 'required',
            'location' => 'required',
            'location' => 'required',
            'email' => 'required|email',
            'website' => 'required|url',
            'mobile' => 'required',
            'whatsapp' => 'required',
            'address' => 'required',
        ]);

        $listing = new Listing();
        $listing->business_name = $request->business_name;
        $listing->user_id = Auth::user()->id;
        $listing->url = Str::slug($request->business_name);
        $listing->description = $request->description;
        $listing->location_id = $request->location;
        $listing->email = $request->email;
        $listing->mobile = $request->mobile;
        $listing->website = $request->website;
        $listing->whatsapp = $request->whatsapp;
        $listing->address = $request->address;
        $listing->save();

        $category = $request->category;
        if(!empty($category)){
            foreach($category as $cat){
                $lc = new ListCategory();
                $lc->listing_id = $listing->id;
                $lc->category_id = $cat['value'];
                $lc->save();
            }
        }
        return Redirect::route('add-business-logo', $listing->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function show(Listing $listing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function edit(Listing $listing)
    {
        $data = array();
        Gate::authorize('view', $listing, Listing::class);
        $data['category'] = Category::get()->map(function($category){
            return [
                'id' => $category->id,
                'label' => $category->name,
                'value' => $category->id,
                'disabled' => 0
            ];
        });
        $data['location'] = Location::get(); 
        $listing->select = $this->selectCategory($listing->selected);
        $data['listing'] = $listing;
        $data['typ'] = 'edit';
        return Inertia::render('User/NewListing', $data);
    }

    public function selectCategory($listcat){
        if(!empty($listcat)){
          return  $listcat->map(function($lc){
               return [
                    'id' => $lc->category->id,
                    'label' => $lc->category->name,
                    'value' => $lc->category->id,
                    'disabled' => 0
               ];
           });
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Listing $listing)
    {
        Gate::authorize('update',$listing, Listing::class);
        $request->validate([
            'business_name' => 'required|unique:listings,business_name,'.$listing->id,
            'description' => 'required|min:50',
            'category' => 'required',
            'location' => 'required',
            'location' => 'required',
            'email' => 'required|email',
            'website' => 'required|url',
            'mobile' => 'required',
            'whatsapp' => 'required',
            'address' => 'required',
        ]);
       
        $listing->business_name = $request->business_name;
        $listing->url = Str::slug($request->business_name);
        $listing->description = $request->description;
        $listing->location_id = $request->location;
        $listing->email = $request->email;
        $listing->mobile = $request->mobile;
        $listing->website = $request->website;
        $listing->whatsapp = $request->whatsapp;
        $listing->address = $request->address;
        $listing->update();
        
        ListCategory::where('listing_id', $listing->id)->delete();
        $category = $request->category;
        if(!empty($category)){
            foreach($category as $cat){
                $lc = new ListCategory();
                $lc->listing_id = $listing->id;
                $lc->category_id = $cat['value'];
                $lc->save();
            }
        }
        return Redirect::route('add-business-logo', $listing->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Listing $listing)
    {
       // return $request;
       $listing->delete();
       if (url()->previous() == url('user-dashboard')) {
            return Redirect::route('user-dashboard');
       }else{
            $arr  = [
                'fcat' =>  $request->fcat,
                'frating' => $request->frating, 
                'fcity' => $request->frating,
                'fkey' => $request->frating,
                'page'=>$request->page
            ];
                //return Redirect::route("admin/view-all-listing", $arr);
            return Redirect::route('admin/view-all-listing')->with('update', 'noupdate');
       }
    }


    public function addBusienssLogo($lid){
        $listing = Listing::find($lid);
        if(!empty($listing)){
            Gate::authorize('view', $listing, Listing::class);
            $data['image'] = $listing->img;
            $data['lid'] = $lid;
            return Inertia::render('User/Form/Logo', $data);
        }
       
    }   

   
    public function uploadBusinessLogo(Request $request){
        $request->validate([
            'image' => 'image|required'
        ]);
        $listing = Listing::find($request->lid);
        if(!empty($request->file('image') && !empty($listing))){
            Gate::authorize('update',$listing, Listing::class);
            $path = $request->file('image')->store('business', 'public');
            $listing->image = $imageName = basename($path); 
            $listing->save();
        }
        return Redirect::route('add-business-logo', $request->lid);
    }

    public function cropBusinessLogo(Request $request){
        
        $listing = Listing::find($request->lid);
        if(!empty($listing)){
            $src =  './'.$listing->img;
            $type = pathinfo($listing->img, PATHINFO_EXTENSION);
            $imageName = basename($src);  
           
            $w =$request->crop['width']; 
            $h = $request->crop['height'];
            $x = $request->crop['x'];
            $y = $request->crop['y'];

            $targ_w =420; $targ_h = 280;

		    $jpeg_quality = 90;
            $simg = Storage::url('business/resize/'.$imageName);
            $save = './'.$simg;
            if($type=="jpeg" or $type=="jpg"){
                $img_r = imagecreatefromjpeg($src);
                $dst_r = imagecreatetruecolor( $targ_w, $targ_h );
                imagecopyresampled($dst_r,$img_r,0,0,$x,$y,
                $targ_w,$targ_h,$w,$h);
                imagejpeg($dst_r, $save);
                return Redirect::route('busines-detail.show', $listing->id);
            }else if($type=="png"){
                $img_r = imagecreatefrompng($src);
                $dst_r = imagecreatetruecolor( $targ_w, $targ_h );
                imagecopyresampled($dst_r,$img_r,0,0,$x,$y,
                $targ_w,$targ_h,$w,$h);
                imagepng($dst_r, $save);
                return Redirect::route('busines-detail.show', $listing->id);
            }else if($type=="gif"){
                $img_r = imagecreatefromgif($src);
                $dst_r = imagecreatetruecolor( $targ_w, $targ_h );
                imagecopyresampled($dst_r,$img_r,0,0,$x,$y,
                $targ_w,$targ_h,$w,$h);
                imagegif($dst_r, $save);
                return Redirect::route('busines-detail.show', $listing->id);
            }else{
                return 'Invalid image Format';
            }
        }
    }

    public function update_listing_featured(Request $request){
       
        $listing = Listing::find($request->id);
        $listing->featured = $request->featured;
        $listing->update();
        return Redirect::route('admin/view-all-listing')->with('update', 'noupdate');
    }

    public function restoreListing(Request $request, $id){
        Listing::withTrashed()->find($id)->restore();
        return Redirect::route("admin/view-trash-listing");
    }
}
