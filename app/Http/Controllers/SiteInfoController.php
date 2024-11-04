<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\SiteInfo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class SiteInfoController extends Controller
{
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $info = SiteInfo::firstOrNew();

        if(!empty($info->logo))  $info->logo = Storage::url($info->logo);
        if(!empty($info->fav))  $info->fav = Storage::url($info->fav);
        if(empty($info->meta))  $info->meta = '';
        if(empty($info->mobile_no_1))  $info->mobile_no_1 = '';
        if(empty($info->mobile_no_2))  $info->mobile_no_2 = '';
        if(empty($info->email_1))  $info->email_1 = '';
        if(empty($info->email_2))  $info->email_2 = '';
        if(empty($info->address))  $info->address = '';
        if(empty($info->web))  $info->web = '';
        if(empty($info->fb))  $info->fb = '';
        if(empty($info->tw))  $info->tw = '';
        if(empty($info->li))  $info->li = '';
        if(empty($info->ins))  $info->ins = '';
        if(empty($info->yt))  $info->yt = '';
        if(empty($info->pin))  $info->pin = '';

        $data['info'] = $info;
        return Inertia::render('Admin/Settings/SiteInfo', $data);
    }

    public function upload_site_logo(Request $request){
        $request->validate([ 'logo' => 'required|image']);
        $app_name = Str::lower(config('app.name')).'_logo';
        $info = SiteInfo::firstOrNew();
        $extension = $request->logo->extension(); 
        $path = $request->file('logo')->storeAs('logo', $app_name.'.'.$extension,'public');
        $info->logo = $path;
        $info->save();
        return Redirect::route('siteinfo.create');
    }

    public function upload_fav_icon(Request $request){
        $request->validate([ 'fav' => 'required|image']);
        $app_name = Str::lower(config('app.name')).'_fav';
        $info = SiteInfo::firstOrNew();
        $extension = $request->fav->extension(); 
        $path = $request->file('fav')->storeAs('fav', $app_name.'.'.$extension,'public');
        $info->fav = $path;
        $info->save();
        return Redirect::route('siteinfo.create');
    }

    public function update_about(Request $request){
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $info = SiteInfo::firstOrNew();
        $info->title = $request->title;
        $info->meta = $request->meta;
        $info->description = $request->description;
        $info->save();
        return Redirect::route('siteinfo.create');
    }

    public function update_contact_details(Request $request){

        $request->validate([
            'mobile_no_1' => 'required|max:15',
            'mobile_no_2' => 'max:15',
            'email_1' => 'required|email',
            'email_2' => 'email',
            'web' => 'url',
            'address' => 'required',
        ]);

        $info = SiteInfo::firstOrNew();
        $info->mobile_no_1 = $request->mobile_no_1;
        $info->mobile_no_2 = $request->mobile_no_2;
        $info->email_1 = $request->email_1;
        $info->email_2 = $request->email_2;
        $info->web = $request->web;
        $info->address = $request->address;
        $info->save();
        return Redirect::route('siteinfo.create');
    }

    public function update_social_links(Request $request){
        

        $info = SiteInfo::firstOrNew();
        $info->fb = $request->fb;
        $info->tw = $request->tw;
        $info->li = $request->li;
        $info->ins = $request->ins;
        $info->yt = $request->yt;
        $info->pin = $request->pin;
        $info->save();
        return Redirect::route('siteinfo.create');
    }

}
