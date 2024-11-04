<?php

namespace App\View\Components\Home;

use App\Models\Category;
use App\Models\Location;
use Illuminate\View\Component;

class Slider extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $locations, $category, $location_id;
    public function __construct()
    {
        $this->locations = Location::get();
        $this->category = Category::get();
        $this->location_id =  session('location_id');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.home.slider');
    }
}
