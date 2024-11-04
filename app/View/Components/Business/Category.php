<?php

namespace App\View\Components\Business;

use Illuminate\View\Component;

class Category extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $cat;
    public function __construct($cat)
    {
        $this->cat = $cat;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.business.category');
    }
}
