<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Bookmark;
use App\Models\Packages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request as Qrequest;

class UserController extends Controller
{
    public function viewUsers(Request $request){
        $query = User::query();
        if(!empty($request->pack)){
            $query = $query->whereRelation('plan', 'package_id', $request->pack);
        }
        if(!empty($request->key)){
            $query->where('name', 'like', $request->key.'%');
        }
        $data['users'] =  $query->paginate(10)->appends(Qrequest::all())->through(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->name,
                'image' => $user->image,
                'role' => $user->role,
                'email' => $user->email,
                'mobile' => $user->mobile,
                'plan' => ($user->plan) ? $user->plan->package->name : '',
            ];
        });
        $data['package'] = Packages::select('id', 'name')->get();
        $data['update'] = session('update');
        return Inertia::render('Admin/User/Manage',$data);
    }

    public function userTrash(Request $request){
        $data['users'] =  User::onlyTrashed()->paginate(10)->appends(Qrequest::all())->through(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->name,
                'image' => $user->image,
                'role' => $user->role,
                'email' => $user->email,
                'mobile' => $user->mobile,
                'plan' => $user->plan?->package->name,
            ];
        });
        return Inertia::render('Admin/Trashed/User',$data);
    }

    public function removeUser($id){
        $user = User::find($id);
        if($user->role != 'admin'){
            $user->delete();
        }
        return Redirect::route('admin/view-users')->with('update', 'noupdate');
    }

    public function restoreUser($id){
        User::withTrashed()->find($id)->restore();
        return Redirect::route('admin/view-trashed-users');
    }

    public function updateProfile(Request $request){
        $uid = Auth::user()->id;
        $request->validate([
            'name' => 'required|max:255',
            'mobile' => 'nullable|max:25',
        ]);
        $user = User::find($uid);
        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->city = $request->city;
        $user->address = $request->address;
        $user->save();
        return Redirect::route('profile');
    }

    public function uploadProfileImage(Request $request){
        $request->validate([
            'image' => 'image|required'
        ]);
        $uid = Auth::user()->id;
        $user = User::find($uid);
        if(!empty($request->file('image') && !empty($user))){
            $path = $request->file('image')->store('user', 'public');
            $user->image = $imageName = basename($path); 
            $user->save();
        }
        return Redirect::route('user-profile-image');
    }

    public function cropProfileImage(Request $request){
        $uid = Auth::user()->id;
        $user = User::find($uid);
        if(!empty($user)){
            $src =  './'.$user->img;
            $type = pathinfo($user->img, PATHINFO_EXTENSION);
            $imageName = basename($src);  
           
            $w =$request->crop['width']; 
            $h = $request->crop['height'];
            $x = $request->crop['x'];
            $y = $request->crop['y'];

            $targ_w =250; $targ_h = 250;

		    $jpeg_quality = 90;
            $simg = Storage::url('user/resize/'.$imageName);
            $save = './'.$simg;
            if($type=="jpeg" or $type=="jpg"){
                $img_r = imagecreatefromjpeg($src);
                $dst_r = imagecreatetruecolor( $targ_w, $targ_h );
                imagecopyresampled($dst_r,$img_r,0,0,$x,$y,
                $targ_w,$targ_h,$w,$h);
                imagejpeg($dst_r, $save);
                return Redirect::route('profile');
            }else if($type=="png"){
                $img_r = imagecreatefrompng($src);
                $dst_r = imagecreatetruecolor( $targ_w, $targ_h );
                imagecopyresampled($dst_r,$img_r,0,0,$x,$y,
                $targ_w,$targ_h,$w,$h);
                imagepng($dst_r, $save);
                return Redirect::route('profile', $listing->id);
            }else if($type=="gif"){
                $img_r = imagecreatefromgif($src);
                $dst_r = imagecreatetruecolor( $targ_w, $targ_h );
                imagecopyresampled($dst_r,$img_r,0,0,$x,$y,
                $targ_w,$targ_h,$w,$h);
                imagegif($dst_r, $save);
                return Redirect::route('profile', $listing->id);
            }
        }
    }
    public function updateBookMark(Request $request){
        $uid = Auth::user()->id;
        if($request->like){
            $bookmark = Bookmark::firstOrNew(['listing_id' => $request->id],['user_id' => $uid]);
            $bookmark->listing_id = $request->id;
            $bookmark->user_id = $uid;
            $bookmark->save();
        }else{
            return  Bookmark::where('user_id', $uid)->where('listing_id', $request->id)->delete();
        }
    }
    public function removeBookmark($id){
        Bookmark::find($id)->delete();
        return Redirect::route('bookmarks');
    }
}
