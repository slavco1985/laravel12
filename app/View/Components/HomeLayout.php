<?php

namespace App\View\Components;

use App\Models\SiteInfo;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Storage;

class HomeLayout extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $fav, $title, $meta, $description, $image;
    public function __construct($title = '', $meta ='', $description='', $image='')
    {
        $site = SiteInfo::select('fav', 'title', 'meta', 'description')->firstOrNew();
        (!empty($site->fav)) ? $this->fav = Storage::url($site->fav) : '';

        
        if(!empty($title)){
            $this->title = $title;
        }else{
            if(!empty($site->title)){
                $this->title = $site->title;
            }else{
                $this->title = 'Smart Directory';
            }
           
        }

        if(!empty($meta)){
            $this->meta = $meta;
        }else{
            if(!empty($site->meta)){
                $this->meta = $site->meta;
            }else{
                $this->meta = 'smart-directory, business directory, business listing';
            }
           
        }

        if(!empty($description)){
            $this->description = $description;
        }else{
            if(!empty($site->description)){
                $this->description = $site->description;
            }else{
                $this->description = 'Smart Directory - Find top rates services and business near you';
            }
           
        }

        $this->image = $image;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.home');
    }
}
