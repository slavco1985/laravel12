<?php

namespace App\View\Components\Business;

use Illuminate\View\Component;
use Illuminate\Support\Facades\URL;

class ListView extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $listings, $typ, $rating, $curl, $key;
    public function __construct($listings, $typ, $rating, $key)
    {
        $this->listings = $listings;
        $this->typ = $typ;
        $this->rating = $rating;
        $this->curl = URL::current();
        $this->key = $key;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.business.list-view');
    }
}
