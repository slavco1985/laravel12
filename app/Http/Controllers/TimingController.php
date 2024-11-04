<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Timing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TimingController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Timing  $timing
     * @return \Illuminate\Http\Response
     */
    public function show($lid)
    {
        $timing = Timing::where('listing_id', $lid)->firstOrNew();
        $data['lid'] = $lid;
        $data['timing'] = $timing;
        return Inertia::render('User/Form/Timing', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Timing  $timing
     * @return \Illuminate\Http\Response
     */
    public function edit(Timing $timing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Timing  $timing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $lid)
    {
        

        $request->validate([
            'iframe' => 'nullable|url',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'youtube' => 'nullable|url',
            'pintrest' => 'nullable|url',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
        ]);
        
        $timing = Timing::where('listing_id', $lid)->firstOrNew();
        $timing->listing_id = $lid;
        $timing->monday_from = $request->monday_from;
        $timing->monday_to = $request->monday_to;
        $timing->tuesday_from = $request->tuesday_from;
        $timing->tuesday_to = $request->tuesday_to;
        $timing->wednesday_from = $request->wednesday_from;
        $timing->wednesday_to = $request->wednesday_to;
        $timing->thursday_from = $request->thursday_from;
        $timing->thursday_to = $request->thursday_to;
        $timing->friday_from = $request->friday_from;
        $timing->friday_to = $request->friday_to;
        $timing->saturday_from = $request->saturday_from;
        $timing->saturday_to = $request->saturday_to;
        $timing->sunday_from = $request->sunday_from;
        $timing->sunday_to = $request->sunday_to;

        $timing->iframe = $request->iframe;

        $timing->facebook = $request->facebook;
        $timing->twitter = $request->twitter;
        $timing->youtube = $request->youtube;
        $timing->pintrest = $request->pintrest;
        $timing->instagram = $request->instagram;
        $timing->linkedin = $request->linkedin;
        $timing->save();

        return Redirect::route('timing.show', $lid);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Timing  $timing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Timing $timing)
    {
        //
    }
}
