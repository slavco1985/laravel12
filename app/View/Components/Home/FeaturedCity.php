<?php

namespace App\View\Components\Home;

use App\Models\Location;
use Illuminate\View\Component;

class FeaturedCity extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $featured_city;
    public function __construct()
    {
        $this->featured_city = Location::where('featured', 1)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.home.featured-city');
    }
}
