<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Listing;
use App\Models\Message;
use App\Models\Category;
use App\Models\ListCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index(){
        $data['count'] = $this->get_count();
        $data['listing'] = $this->lastWeekPost();
        $data['message'] = $this->lastWeekMessages();
        $data['category'] = $this->postByCategory();
        return Inertia::render('Admin/Dashboard',$data);
    }

    public function get_count(){
        $arr['category'] = Category::count();
        $arr['listing'] = Listing::count();
        $arr['user'] = User::count();
        $arr['blog'] = Blog::count();
        return $arr;
    }

    public function login(){
        $user = User::where('role', 'admin');
        if(User::where('role', 'admin')->count()){
            return Inertia::render('Auth/AdminLogin', [
                'canResetPassword' => Route::has('password.request'),
                'status' => session('status'),
            ]);
        }else{
            return Inertia::render('Auth/AdminRegister');
        }
           
    }
    public function password_settings(){
        return Inertia::render('Admin/Settings/Password');
    }
    public function change_password(Request $request){

        $request->validate([
            'oldpassword' => 'required|current_password',
            'password' => ['required', 'confirmed', Rules\Password::defaults()]
        ]);
        
        $id = Auth::user()->id;
        $user = User::where('role', 'admin')->where('id', $id)->first();
        if(!empty($user)){
            $res = Hash::check($request->oldpassword, $user->password);
            if($res){
                $user->forceFill([
                    'password' => Hash::make($request->password),
                ])->save();
                    return back()->with('msg', 'success');
            }else{
                    $errors = 'Old Password Wrong';
                    return back()->with('msg', 'fail');
            }
        }
    }

    public function lastWeekPost(){
        $lablearr = array(); $valarr = array();
       
		
        $fdat = Carbon::today();
		array_push($lablearr, Carbon::parse($fdat)->format('d M Y'));
		$val = Listing::whereDate('created_at',  $fdat)->count();
		array_push($valarr, $val);

        $fdat = Carbon::today()->subDays(1);
		array_push($lablearr,  Carbon::parse($fdat)->format('d M Y'));
		$val = Listing::whereDate('created_at', $fdat)->count();
		array_push($valarr, $val);

        $fdat = Carbon::today()->subDays(2);
		array_push($lablearr,  Carbon::parse($fdat)->format('d M Y'));
		$val = Listing::whereDate('created_at', $fdat)->count();
		array_push($valarr, $val);

        $fdat = Carbon::today()->subDays(3);
		array_push($lablearr,  Carbon::parse($fdat)->format('d M Y'));
		$val = Listing::whereDate('created_at',  $fdat)->count();
		array_push($valarr, $val);

        $fdat = Carbon::today()->subDays(4);
		array_push($lablearr,  Carbon::parse($fdat)->format('d M Y'));
		$val = Listing::whereDate('created_at', $fdat)->count();
		array_push($valarr, $val);

        $fdat = Carbon::today()->subDays(5);
		array_push($lablearr,  Carbon::parse($fdat)->format('d M Y'));
		$val = Listing::whereDate('created_at',  $fdat)->count();
		array_push($valarr, $val);

        $fdat = Carbon::today()->subDays(6);
		array_push($lablearr,  Carbon::parse($fdat)->format('d M Y'));
		$val = Listing::whereDate('created_at',  $fdat)->count();
		array_push($valarr, $val);

        $new_arr = array('label' => $lablearr, 'val' => $valarr);
		return $new_arr;
    }

    public function lastWeekMessages(){
        $lablearr = array(); $valarr = array();
       
		
        $fdat = Carbon::today();
		array_push($lablearr, Carbon::parse($fdat)->format('d M Y'));
		$val = Message::whereDate('created_at',  $fdat)->count();
		array_push($valarr, $val);

        $fdat = Carbon::today()->subDays(1);
		array_push($lablearr,  Carbon::parse($fdat)->format('d M Y'));
		$val = Message::whereDate('created_at', $fdat)->count();
		array_push($valarr, $val);

        $fdat = Carbon::today()->subDays(2);
		array_push($lablearr,  Carbon::parse($fdat)->format('d M Y'));
		$val = Message::whereDate('created_at', $fdat)->count();
		array_push($valarr, $val);

        $fdat = Carbon::today()->subDays(3);
		array_push($lablearr,  Carbon::parse($fdat)->format('d M Y'));
		$val = Message::whereDate('created_at',  $fdat)->count();
		array_push($valarr, $val);

        $fdat = Carbon::today()->subDays(4);
		array_push($lablearr,  Carbon::parse($fdat)->format('d M Y'));
		$val = Message::whereDate('created_at', $fdat)->count();
		array_push($valarr, $val);

        $fdat = Carbon::today()->subDays(5);
		array_push($lablearr,  Carbon::parse($fdat)->format('d M Y'));
		$val = Message::whereDate('created_at',  $fdat)->count();
		array_push($valarr, $val);

        $fdat = Carbon::today()->subDays(6);
		array_push($lablearr,  Carbon::parse($fdat)->format('d M Y'));
		$val = Message::whereDate('created_at',  $fdat)->count();
		array_push($valarr, $val);

        $new_arr = array('label' => $lablearr, 'val' => $valarr);
		return $new_arr;
    }

    public function postByCategory(){
        $lablearr = array(); $valarr = array();
        $category = Category::get();
        if(!empty($category)){
            foreach($category as $c){
                $count = ListCategory::where('category_id', $c->id)->count();
                if($count){
                    array_push($lablearr, $c->name);
                    array_push($valarr, $count);
                }
            }
            $new_arr = array('label' => $lablearr, 'val' => $valarr);
            return $new_arr;
        }else{
            array('label' => [], 'val' => []);
        }
    } 

    public function image_upload(Request $request){
        if(!empty($request->file('image'))){
            $path = $request->file('image')->store('editor', 'public');
            $imgurl = Storage::url($path);
            return array(
                'success' => 1,
                'file' => array(
                    'url' => $imgurl
                )
            );
        }
    }
}
