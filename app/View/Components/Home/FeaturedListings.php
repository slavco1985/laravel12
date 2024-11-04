<?php

namespace App\View\Components\Home;

use App\Models\Listing;
use App\Models\AppSettings;
use Illuminate\View\Component;

class FeaturedListings extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $listings;
    public function __construct()
    {
        $limit = 3;
        $setting = AppSettings::first();
        if(!empty($setting->featured_list)){
            $limit = $setting->featured_list;
        }
        $this->listings = Listing::where('featured', 1)->limit($limit)->orderBy('id', 'desc')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.home.featured-listings');
    }
}
