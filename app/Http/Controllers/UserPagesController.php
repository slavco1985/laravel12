<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Rating;
use App\Models\Listing;
use App\Models\Message;
use App\Models\Bookmark;
use App\Models\Category;
use App\Models\Packages;
use App\Models\Purchase;
use App\Models\UserPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class UserPagesController extends Controller
{
    public function choos_package(){
        $data['package'] = Packages::get();
        return Inertia::render('User/ChoosPackage', $data);
    }
    public function dashboard(){
        $uid = Auth::user()->id;
        $data['listing'] = Listing::where('user_id', $uid)->limit(2)->orderBy('id', 'desc')->get()->transform(function ($list) { 
            return [
                'id' => $list->id,
                'business_name' => $list->business_name,
                'description' => $list->description,
                'city' => $list->city->name,
                'image' => $list->resize,
                'user_id' => $list->user_id,
                'mobile' => $list->mobile,
                'email' => $list->email,
                'url' => $list->url,
                'address' => $list->address,
            ];
        });
        $data['count'] = $this->userCount($uid);
        return Inertia::render('User/UserDashboard', $data);
    }

    public function userCount($uid){
        $arr['listing'] = Listing::where('user_id', $uid)->count();
        $arr['review'] = Rating::where('user_id', $uid)->count();
       $arr['message'] = Message::whereRelation('listing', 'user_id', $uid)->count();

        return $arr;
    }

    public function profile(){
        $uid = Auth::user()->id;
        $profile = User::find($uid);
        $data['profile'] = $profile;
        return Inertia::render('User/Profile', $data);
    }

    public function my_listing(){
        $uid = Auth::user()->id;
        $data['listing'] = Listing::where('user_id', $uid)->limit(2)->orderBy('id', 'desc')->paginate(5)->through(function ($list) { 
            return [
                'id' => $list->id,
                'business_name' => $list->business_name,
                'description' => $list->description,
                'city' => $list->city->name,
                'image' => $list->resize,
                'user_id' => $list->user_id,
                'mobile' => $list->mobile,
                'email' => $list->email,
                'url' => $list->url,
                'address' => $list->address,
                'rating' => $list->rating,
                'rcount' => $list->rcount
            ];
        });
        return Inertia::render('User/MyListing', $data);
    }

    public function bookmarks(){
        $uid = Auth::user()->id;
        // $listig = Bookmark::where('listing', 'user_id', $uid)->get();
        // return $listig;
        $data['listing'] = Bookmark::where('user_id', $uid)->paginate(2)->through(function ($fav) {
            return [
                'id' => $fav->id,
                'business_name' => $fav->listing->business_name,
                'description' => $fav->listing->description,
                'city' => $fav->listing->city->name,
                'image' => $fav->listing->resize,
                'user_id' => $fav->listing->user_id,
                'mobile' => $fav->listing->mobile,
                'email' => $fav->listing->email,
                'url' => $fav->listing->url,
                'address' => $fav->listing->address,
            ];
        });
        return Inertia::render('User/Bookmarks', $data);
    }

    public function reviews(){
        $uid = Auth::user()->id;
        $data['review'] = Rating::where('user_id', $uid)->paginate(2)->through(function ($rev){
            return [
                'id' => $rev->id,
                'rating' => $rev->rating,
                'message' => $rev->message,
                'business' => $rev->listing->business_name,
            ];
        });
        return Inertia::render('User/Reviews', $data);
    }

    public function active_plan(){
        $uid = Auth::user()->id;
        $plan = UserPackage::where('user_id', $uid)->first();
        if(!empty($plan)){
            $data['plan'] = $plan;
            $data['pack'] = $plan->package;
           
            $data['expery'] =  Carbon::create($plan->expery)->format('M d Y');
            
        }else{
            $data['plan'] = [];
            $data['pack'] = [];
            $data['expery'] = '';
        }
        
        return Inertia::render('User/Plan', $data);
    }

    public function payment_history(){
        $uid = Auth::user()->id;
        $data['purchase'] = Purchase::where('user_id', $uid)->get()->transform(function($purchas){
            return [
                'id' => $purchas->id,
                'amount' => $purchas->package->price,
                'pack' => $purchas->package->name,
                'transaction_id' => $purchas->transaction_id,
                'dat' =>  Carbon::createFromFormat('Y-m-d H:i:s', $purchas->created_at)->format('M d Y')

            ];
        });;
        return Inertia::render('User/Payments', $data);
    }
    public function user_messages(){
        $uid = Auth::user()->id;
        $data['message'] =  Message::whereRelation('listing', 'user_id', $uid)->paginate(2);
        return Inertia::render('User/UserMessages', $data);
    }

    public function user_settings(){
        return Inertia::render('User/UserSettings');
    }
    public function toDashboard(){
        return Inertia::location(route('user-dashboard'));
    }

    public function userLogin(){
        return Inertia::render('User/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
        ]);
    }

    public function userRegistration(){
        return Inertia::render('User/Registration', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
        ]);
    }

    public function userProfileImage(){
        $uid = Auth::user()->id;
        $profile = User::find($uid);
        $data['image'] = $profile->img;
        return Inertia::render('User/ProfileImage', $data);
    }

    public function userImport(){
        $data['category'] = Category::get();
        $uid = Auth::user()->id;
        $data['business'] = Listing::where('user_id', $uid)->get();
        return Inertia::render('User/Import', $data);
    }
}
