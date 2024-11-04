<?php

namespace App\View\Components\Business;

use App\Models\Gallery as GM;
use Illuminate\View\Component;

class Gallery extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $gallery, $bid;
    public function __construct($bid)
    {
        $this->gallery = GM::where('listing_id', $bid)->limit(4)->get();
        $this->bid = $bid;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.business.gallery');
    }
}
