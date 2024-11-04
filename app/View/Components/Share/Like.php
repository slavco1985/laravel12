<?php

namespace App\View\Components\Share;

use Illuminate\View\Component;

class Like extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id, $like;
    public function __construct($id, $like)
    {
        $this->id = $id;
        $this->like = $like;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.share.like');
    }
}
