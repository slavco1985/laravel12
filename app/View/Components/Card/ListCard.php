<?php

namespace App\View\Components\Card;

use Illuminate\View\Component;

class ListCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $list;
    public function __construct($list)
    {
        $this->list = $list;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card.list-card');
    }
}
