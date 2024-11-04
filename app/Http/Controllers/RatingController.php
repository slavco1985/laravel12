<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Mail\Review;
use App\Models\Rating;
use App\Models\Listing;
use App\Models\AppSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class RatingController extends Controller
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

       $validator = Validator::make($request->all(), [
            'star' => 'required|numeric',
            'message' => 'required|min:3',
        ]);
        if ($validator->fails()) {
            return  array('error' => $validator->errors());
        }
        $uid = Auth::user()->id;
        $rating = new Rating();
        $rating->user_id = $uid;
        $rating->listing_id = $request->lid;
        $rating->rating = $request->star;
        $rating->message = $request->message;
        $rating->save();

        $count = Rating::where('listing_id', $request->lid)->count();
        $sum = Rating::where('listing_id', $request->lid)->sum('rating');
        $star = $sum / $count;
        $list =  Listing::find($request->lid);
        if(!empty($list)){
            $list->rating = $star;
            $list->update();
        }

        $setting = AppSettings::first();
        if(!empty($setting->review_notification)){
            $email = Listing::find($request->lid)->user->email;
            try {
                Mail::to($email)->send(new Review($rating));
            } 
            catch (Swift_TransportException $e) {
                echo $e->getMessage();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function show(Rating $rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function edit(Rating $rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rating $rating)
    {
        $this->authorize('update', $rating, Rating::class);
        $rating->message = $request->message;
        $rating->save();
        return Redirect::back();
    }

    public function updaterating(Request $request, $id){
        $rating = Rating::find($id);
        $this->authorize('update', $rating, Rating::class);
        $rating->message = $request->message;
        $rating->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rating $rating)
    {
        $this->authorize('delete', $rating, Rating::class);
        $rating->delete();
        return Redirect::back();
    }

    public function deleterating($id){
        $rating = Rating::find($id);
        $rating->delete();
    }

    public function getMoreReviews($bid, $ofset){
        return Rating::where('listing_id', $bid)->limit(3)->orderBy('id','desc')->offset($ofset*3)->get()->transform(function($review){
            return [
                'id' => $review->id,
                'rating' => $review->rating,
                'message' => $review->message,
                'user' => $review->user,
                'dat' => Carbon::parse($review->created_at)->format('d M Y')
            ];
        });
    }
}
