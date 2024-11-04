<?php

namespace App\View\Components\Card;

use Illuminate\View\Component;

class GridCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $list, $footTyp;
    public function __construct($list, $footTyp)
    {
        $this->list = $list;
        $this->footTyp = $footTyp;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card.grid-card');
    }
}
