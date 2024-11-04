<?php

namespace App\View\Components\Business;

use Illuminate\View\Component;

class Postedby extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $user, $business_id;
    public function __construct($user, $bid)
    {
        $this->user = $user;
        $this->business_id = $bid;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.business.postedby');
    }
}
