<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\AppSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AppSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = AppSettings::first();
        if(empty($settings)){
            $settings = new AppSettings();
            $settings->email_activation = 0;
            $settings->currency = 'USD/$';
            $settings->currency_type = 'Symbol';
            $settings->messsage_notification = 0;
            $settings->review_notification = 0;
            $settings->list_view = 12;
            $settings->grid_view = 12;
            $settings->blog = 12;
            $settings->featured_list = 3;
            $settings->latest_list = 3;
        }
        $data['settings'] = $settings;
        return Inertia::render('Admin/Settings/AppSettings',$data);
    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $settings = AppSettings::firstOrNew();
        $settings->email_activation = $request->email_activation;
        $settings->currency = $request->currency;
        if(!empty($request->currency)){
            $ex = explode('/', $request->currency);
            if(!empty($ex[0])) $settings->currency_code = $ex[0];
            if(!empty($ex[1])) $settings->currency_symbol = $ex[1];
        }
        $settings->currency_type = $request->currency_type;
        $settings->messsage_notification = $request->messsage_notification;
        $settings->review_notification = $request->review_notification;
        $settings->list_view = $request->list_view;
        $settings->grid_view = $request->grid_view;
        $settings->blog = $request->blog;
        $settings->featured_list = $request->featured_list;
        $settings->latest_list = $request->latest_list;
        $settings->save();
        return Redirect::route('app-settings.index');
    }
}
