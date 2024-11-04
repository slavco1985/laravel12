<?php

namespace App\View\Components\Business;

use App\Models\Timing;
use Illuminate\View\Component;

class SocialLink extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $social;
    public function __construct($bid)
    {
        $this->social = Timing::where('listing_id', $bid)->first();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.business.social-link');
    }
}
