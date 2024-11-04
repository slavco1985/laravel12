<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Page;
use App\Models\Listing;
use App\Models\Category;
use App\Models\Location;
use App\Models\Packages;
use App\Models\Subscriber;
use App\Models\AppSettings;
use App\Models\UserPackage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request as Qrequest;

class PagesController extends Controller
{
    public function index(){
        return view('pages/index');
    }

    public function view_all_categories(){
        $data['category'] = Category::get();
        return view('pages/view_all_category', $data);
    }
    public function view_all_cities(){
        $data['city'] = Location::get();
        return view('pages/view_all_cities', $data);
    }

    public function view_all_listings(Request $request){
       
        $setting = AppSettings::first();
        $data['cat'] = '';
        if($request->typ == 'grid'){
            $data['typ'] = 'grid';
            if(!empty($setting->grid_view)){
                $limit = $setting->grid_view;
            }else{
                $limit = 10;
            }
           
        }else{
            $data['typ'] = 'list';
            if(!empty($setting->list_view)){
                $limit = $setting->list_view;
            }else{
                $limit = 10;
            }
           
        }
      
        $query = Listing::query();
        if(!empty($request->key)){
            $query->where('business_name', 'like', $request->key.'%');
            $data['key'] = $request->key;
        }else{
            $data['key'] = '';
        }
        if(!empty($request->rating)){
            $data['rating'] = $request->rating;
            $query->where('rating', 'like', $request->rating.'%');
        }else{
            $data['rating'] = 0;
        }

        if(session()->has('location_id')){
            $query->where('location_id', session('location_id'));
        }

        $data['listings'] = $query->paginate($limit)->appends(Qrequest::all());
        return view('pages/view_all_listings', $data);
    }

    public function filter_by_category(Request $request, $cat){
     
        $setting = AppSettings::first();
        $category = Category::where('url', $cat)->first();
        $catid = $category->id;
        $data['category'] = $category;
        if(!empty($catid)){
            $data['cat'] = $catid;
            if($request->typ == 'grid'){
                $data['typ'] = 'grid';
                if(!empty($setting->grid_view)){
                    $limit = $setting->grid_view;
                }else{
                    $limit = 10;
                }
            }else{
                $data['typ'] = 'list';
                if(!empty($setting->list_view)){
                    $limit = $setting->list_view;
                }else{
                    $limit = 10;
                }
            }

            $query = Listing::query();
            $query->whereRelation('selected', 'category_id', $catid);
            if(!empty($request->key)){
                $query->where('business_name', 'like', $request->key.'%');
                $data['key'] = $request->key;
            }else{
                $data['key'] = '';
            }
            
            if(!empty($request->rating)){
                $data['rating'] = $request->rating;
                $query->where('rating', 'like', $request->rating.'%');
            }else{
                $data['rating'] = 0;
            }
            if(session()->has('location_id')){
                $query->where('location_id', session('location_id'));
            }

            $data['listings'] = $query->paginate($limit)->appends(Qrequest::all());
            return view('pages/view_all_listings', $data);
        }
       
    }

    public function view_single_business($url){
        $list = Listing::where('url', $url)->first();
        if(!empty($list)){
            $data['list'] = $list;
            $userPack =  UserPackage::where('user_id', $list->user_id)->first();
            if($userPack){
                if($userPack->package->review == 'Yes'){
                    $data['isreview'] = true;
                }else{
                    $data['isreview'] = false;
                }
            }else{
                if(Packages::exists()){
                    $data['isreview'] = false;
                }else{
                    $data['isreview'] = true;
                }
            }
            return view('pages/view_single_business', $data);
        }else{
            return abort(404);
        }
        
    }

    public function set_location(Request $request)
    {
        $request->session()->put('location_id', $request->location);
        $url = URL::previous();
        $nurl = Str::replace('page=', '', $url);
        return redirect($nurl);
    }

    public function remove_location(Request $request)
    {
        $request->session()->forget('location_id');
        $request->session()->forget('location_name');
    }

    public function search_listings(Request $request){
        return redirect('all-listings?key='.$request->key);
    }

    public function search_with_cat_loc(Request $request){
        if(!empty($request->location)){
            $request->session()->put('location_id', $request->location);
        }
        if(!empty($request->cat)){
            $category = Category::find($request->cat);
            if(!empty($category)){
                return redirect('cat/'.$category->url.'?key='.$request->key);
            }
        }else{
            return redirect('all-listings?key='.$request->key);
        }
    }

    public function filter_by_city(Request $request, $city){
        if(!empty($city)){
            $location = Location::where('url', $city)->first();
            if(!empty($location->id)){
                $request->session()->put('location_id', $location->id);
                return redirect('all-listings');
            }
            
        }
    }

    public function view_all_blogs(){
        $data['blogs'] = Blog::orderBy('id', 'desc')->paginate(3);
        $data['typ'] = 'all';
        return view('pages/view_blogs', $data);
    }
    public function blog_by_cat($url){
        $category = Category::where('url', $url)->first();
        if(!empty($category)){
            $data['typ'] = 'cat';
            $data['cat'] = $category;
            $data['blogs'] = Blog::where('category_id', $category->id)->orderBy('id', 'desc')->paginate(4);
            return view('pages/view_blogs', $data);
        }else{
            return abort(404);
        }
        
    }

    public function single_blog($burl){
        $blog = Blog::where('url', $burl)->first();
        $data['blog'] = $blog;
        $data['content'] = $this->expandtoHTML($blog->detail);
        $data['category'] = Category::select('id','name', 'url')->get();
        return view('pages/single_blog', $data);
    }

    public function view_page($url){
        $page = Page::where('url', $url)->first();
        if(!empty($page)){
            $page->content = $this->expandtoHTML($page->content);
            $data['page'] = $page;
            return view('pages/view_page', $data);
        }else{
            return abort(404);
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

    public function submitNewsLetter(Request $request){
        $request->validate([
            'email' => 'required|email',
        ]);
        $subscribe = new Subscriber();
        $subscribe->email = $request->email;
        $subscribe->save();
        return Redirect::route('subscribe-success');
    }
    public function subscribeSuccess(){
        $data['title'] = "Thanks for Subscribe with US";
        $data['message'] = "You Will Recieve Latest News and Updates straight into your inbox";
        return view('pages/success', $data);
    }
    
}
