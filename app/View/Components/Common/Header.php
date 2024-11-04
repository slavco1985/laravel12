<?php

namespace App\View\Components\Common;

use App\Models\Location;
use App\Models\SiteInfo;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Storage;

class Header extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $locations, $location_id, $search='', $logo;
    public function __construct()
    {
        $this->locations = Location::get();
        $this->location_id =  session('location_id');
        if(!empty(request()->key)){
            $this->search = request()->key;
        }
        $site = SiteInfo::select('logo')->firstOrNew();
        (!empty($site->logo)) ? $this->logo = Storage::url($site->logo) : '';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.common.header');
    }
}
