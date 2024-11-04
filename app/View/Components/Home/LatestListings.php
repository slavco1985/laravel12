<?php

namespace App\View\Components\Home;

use App\Models\Listing;
use App\Models\AppSettings;
use Illuminate\View\Component;

class LatestListings extends Component
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
        if(!empty($setting->latest_list)){
            $limit = $setting->latest_list;
        }
        $this->listings = Listing::limit($limit)->orderBy('id', 'desc')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.home.latest-listings');
    }
}
