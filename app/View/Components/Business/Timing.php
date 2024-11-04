<?php

namespace App\View\Components\Business;

use App\Models\Timing as Tim;
use Illuminate\View\Component;

class Timing extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $timing;
    public function __construct($bid)
    {
        $this->timing = Tim::where('listing_id', $bid)->first();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.business.timing');
    }
}
