<?php

namespace App\View\Components\Business;

use App\Models\UserPackage;
use Illuminate\View\Component;

class ContactForm extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $bid, $form = 'Not Allowed';
    public function __construct($bid, $uid)
    {
        $this->bid = $bid;
        $userPack =  UserPackage::where('user_id', $uid)->first();
        if($userPack){
            $this->form = $userPack->package->message;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.business.contact-form');
    }
}
