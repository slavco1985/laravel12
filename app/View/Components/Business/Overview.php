<?php

namespace App\View\Components\Business;

use App\Models\BusinessDetail;
use Illuminate\View\Component;

class Overview extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $bname, $bid, $detail='';
    public function __construct($bname, $bid)
    {
        $this->bname = $bname;
        $this->bid = $bid;
        $detail = BusinessDetail::where('listing_id', $bid)->first();
        if(!empty($detail)){
            $this->detail = $this->expandtoHTML($detail->about);
        }
       
    
    }

    public function expandtoHTML($jsonStr){
        if(!empty($jsonStr)){
            $obj = json_decode($jsonStr);
            $html = '';

            if(!empty($obj->blocks)){
                foreach ($obj->blocks as $block) {
                    switch ($block->type) {
                        case 'paragraph':
                            $html .= '<p class="mb-2">' . $block->data->text . '</p>';
                            break;
                        
                        case 'header':
                            $html .= '<h'. $block->data->level .'>' . $block->data->text . '</h'. $block->data->level .'>';
                            break;
    
                        case 'raw':
                            $html .= $block->data->html;
                            break;
    
                        case 'list':
                            $lsType = ($block->data->style == 'ordered') ? 'ol' : 'ul';
                            $html .= '<' . $lsType . '>';
                            foreach($block->data->items as $item) {
                                $html .= '<li>' . $item . '</li>';
                            }
                            $html .= '</' . $lsType . '>';
                            break;
                        
                        case 'code':
                            $html .= '<pre><code class="language-'. $block->data->lang .'">'. $block->data->code .'</code></pre>';
                            break;
                        
                        case 'image':
                            $html .= '<div class="img_pnl"><img src="'. $block->data->file->url .'" /></div>';
                            break;
                        
                        default:
                            break;
                    }
                }
                return $html;
            }
            
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.business.overview');
    }
}
