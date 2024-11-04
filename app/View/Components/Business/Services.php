<?php

namespace App\View\Components\Business;

use App\Models\Service;
use Illuminate\View\Component;

class Services extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $bid, $services;
    public function __construct($bid)
    {
        $this->bid = $bid;
        $this->services = Service::where('listing_id', $bid)->limit(6)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.business.services');
    }
}
