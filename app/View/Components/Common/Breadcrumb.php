<?php

namespace App\View\Components\Common;

use Illuminate\View\Component;

class Breadcrumb extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title, $path, $pathUrl;
    public function __construct($title, $path, $pathUrl)
    {
        $this->title = $title;
        $this->path = $path;
        $this->pathUrl = $pathUrl;
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.common.breadcrumb');
    }
}
