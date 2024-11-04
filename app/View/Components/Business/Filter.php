<?php

namespace App\View\Components\Business;

use App\Models\Category;
use Illuminate\View\Component;

class Filter extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $category, $rating, $cat, $typ, $key;
    public function __construct($rating, $cat, $typ, $key)
    {
        $this->category = Category::get();
        $this->rating = $rating;
        $this->cat = $cat;
        $this->typ = $typ;
        $this->key = $key;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.business.filter');
    }
}
