<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['category'] = Category::get();
        return Inertia::render('Admin/Category/Manage',$data);
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
            'name' => 'required|unique:categories|max:255',
            'description' => 'required',
            'icon' => 'nullable|image'
        ]);
        $cat = new Category();
        if(!empty($request->file('icon'))){
            $path = $request->file('icon')->store('icon','public');
            $cat->icon = $path;
        }
        $cat->name = $request->name;
        $cat->url = Str::slug($request->name);
        $cat->description = $request->description;
       
        $cat->save();
       return Redirect::route('category.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,'.$category->id,
            'description' => 'required',
            'icon' => 'image'
        ]);
        if(!empty( $request->file('icon'))){
            $path = $request->file('icon')->store('icon','public');
            $category->icon = $path;
        }
       
        $category->name = $request->name;
        $category->description = $request->description;
        $category->url =Str::slug($request->name);
        $category->save();
       return Redirect::route('category.create');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return Redirect::route('category.create');
    }

    public function update_category_featured(Request $request){
        $category = Category::find($request->id);
        $category->featured = $request->featured;
        $category->update();
        return Redirect::route('category.create');
    }
}
