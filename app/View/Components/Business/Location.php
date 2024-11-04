<?php

namespace App\View\Components\Business;

use App\Models\Timing;
use Illuminate\View\Component;

class Location extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $address, $iframe = '';
    public function __construct($address, $bid)
    {
        $this->address = $address;
        $tim =  Timing::select('iframe')->where('listing_id', $bid)->first();
        if(!empty($tim)){
            $this->iframe = $tim->iframe;
        }
       
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.business.location');
    }
}
