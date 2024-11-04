<?php

namespace App\View\Components\Share;

use Illuminate\View\Component;

class Review extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $rating, $count;
    public function __construct($rating, $count)
    {
        $this->rating = $rating;
        $this->count = $count;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.share.review');
    }
}
