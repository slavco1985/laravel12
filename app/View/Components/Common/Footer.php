<?php

namespace App\View\Components\Common;

use App\Models\Category;
use App\Models\SiteInfo;
use Illuminate\View\Component;

class Footer extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $info, $category;
    public function __construct()
    {
        $site = SiteInfo::firstOrNew();
        $this->category = Category::where('featured', 1)->limit(7)->get();
        $this->info = $site;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.common.footer');
    }
}
