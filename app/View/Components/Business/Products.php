<?php

namespace App\View\Components\Business;

use App\Models\Product;
use Illuminate\View\Component;

class Products extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $products, $bid;
    public function __construct($bid)
    {
        $this->bid = $bid;
        $this->products = Product::where('listing_id', $bid)->limit(6)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.business.products');
    }
}
