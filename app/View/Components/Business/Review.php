<?php

namespace App\View\Components\Business;

use App\Models\Rating;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class Review extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $bid, $review, $uid =0;
    public function __construct($bid)
    {
        $this->bid = $bid;
        $this->review = Rating::where('listing_id', $bid)->limit(3)->orderBy('id', 'desc')->get();
        if(Auth::check()){
            $this->uid = Auth::user()->id;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.business.review');
    }
}
