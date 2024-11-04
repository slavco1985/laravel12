<?php

namespace App\View\Components\Home;

use App\Models\Blog;
use Illuminate\View\Component;

class LatestBlog extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $latestBlog;
    public function __construct()
    {
        $this->latestBlog = Blog::orderBy('id', 'desc')->limit(3)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.home.latest-blog');
    }
}
