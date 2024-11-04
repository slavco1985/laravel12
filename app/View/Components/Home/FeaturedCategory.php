<?php

namespace App\View\Components\Home;

use App\Models\Category;
use Illuminate\View\Component;

class FeaturedCategory extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $featuredCategory;
    public function __construct()
    {
        $this->featuredCategory = Category::where('featured', 1)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.home.featured-category');
    }
}
