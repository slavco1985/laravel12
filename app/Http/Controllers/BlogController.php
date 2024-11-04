<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['blogs'] = Blog::orderBy('id', 'desc')->paginate(10);
        return Inertia::render('Admin/Blog/Manage', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['category'] = Category::select('id','name')->get();
        $data['blog'] = new Blog();
        return Inertia::render('Admin/Blog/Create', $data);
    }

    public function blogImage($bid){
        $blog = Blog::find($bid);
        $data['bid'] = $bid;
        $data['image'] = $blog->img;
        return Inertia::render('Admin/Blog/Image', $data);
    }

    public function blogDetail($bid){
        $blog = Blog::find($bid);
        $data['bid'] = $bid;
        $data['detail'] = json_decode($blog->detail);
        return Inertia::render('Admin/Blog/Detail', $data);
    }

    public function updateBlogDetail(Request $request){
        $blog = Blog::find($request->bid);
        if(!empty($blog)){
            $blog->detail = json_encode($request->data);
            $blog->save();
        }
        return Redirect::route('admin/blog-detail', $request->bid);  
    }

    public function cropBlogImage(Request $request){
        $blog = Blog::find($request->bid);
        if(!empty($blog)){
            $src =  './'.$blog->img;
            $type = pathinfo($blog->img, PATHINFO_EXTENSION);
            $imageName = basename($src);  
           
            $w =$request->crop['width']; 
            $h = $request->crop['height'];
            $x = $request->crop['x'];
            $y = $request->crop['y'];

            $targ_w =420; $targ_h = 280;

		    $jpeg_quality = 90;
            $simg = Storage::url('blog/resize/'.$imageName);
            $save = './'.$simg;
            if($type=="jpeg" or $type=="jpg"){
                $img_r = imagecreatefromjpeg($src);
                $dst_r = imagecreatetruecolor( $targ_w, $targ_h );
                imagecopyresampled($dst_r,$img_r,0,0,$x,$y,
                $targ_w,$targ_h,$w,$h);
                imagejpeg($dst_r, $save);
                return Redirect::route('admin/blog-detail', $blog->id);
            }else if($type=="png"){
                $img_r = imagecreatefrompng($src);
                $dst_r = imagecreatetruecolor( $targ_w, $targ_h );
                imagecopyresampled($dst_r,$img_r,0,0,$x,$y,
                $targ_w,$targ_h,$w,$h);
                imagepng($dst_r, $save);
                return Redirect::route('admin/blog-detail', $blog->id);
            }else if($type=="gif"){
                $img_r = imagecreatefromgif($src);
                $dst_r = imagecreatetruecolor( $targ_w, $targ_h );
                imagecopyresampled($dst_r,$img_r,0,0,$x,$y,
                $targ_w,$targ_h,$w,$h);
                imagegif($dst_r, $save);
                return Redirect::route('admin/blog-detail', $blog->id);
            }else{
                return 'Invalid Image Format';
            }
        }
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:blogs|max:225',
            'category' => 'required',
            'image' => 'required|image',
            'description' => 'required'
        ]);

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->category_id = $request->category;
        $blog->url = Str::slug($request->title);
        if(!empty($request->file('image'))){
            $path = $request->file('image')->store('blog', 'public');
            $blog->image = $imageName = basename($path); 
        }
        $blog->description = $request->description;
        $blog->save();
        if(!empty($blog->image)){
            return Redirect::route('admin/blog-image', $blog->id);
        }
        else{
            return Redirect::route('admin/blog-detail', $blog->id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $data['category'] = Category::select('id','name')->get();
        $data['blog'] = $blog;
        return Inertia::render('Admin/Blog/Create', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
       
        $request->validate([
            'title' => 'required|max:225|unique:blogs,title,'.$blog->id,
            'category' => 'required',
            'image' => 'nullable|image',
            'description' => 'required'
        ]);

        $blog->title = $request->title;
        $blog->category_id = $request->category;
        $blog->url =Str::slug($request->title);
        if(!empty($request->file('image'))){
            $path = $request->file('image')->store('blog', 'public');
            $blog->image = $imageName = basename($path); 
        }
        $blog->description = $request->description;
        $blog->save();
        if(!empty($blog->image)){
            return Redirect::route('admin/blog-image', $blog->id);
        }
        else{
            return Redirect::route('admin/blog-detail', $blog->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return Redirect::route('blog.index');
    }
}
