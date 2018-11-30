<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BlogCategory;
use Session;
class BlogCategories extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogCategories=BlogCategory::all();

        return view('admin.blogCategories.index')->withblogCategories($blogCategories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogCategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'category' => 'required|string|max:255',
      ]);

      $blogCategory=new BlogCategory();

      $blogCategory->category=$request->category;
      $blogCategory->description=$request->description;
      $blogCategory->save();

      Session::flash('success','You have succesfully add new blog category.');

      return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blogCategory=BlogCategory::findOrFail($id);
        return view('admin.BlogCategories.edit')->withblogCategory($blogCategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'category' => 'required|string|max:255',
      ]);

      $blogCategory=BlogCategory::findOrFail($id);

      $blogCategory->category=$request->category;
      $blogCategory->description=$request->description;
      $blogCategory->save();

      Session::flash('success','You have succesfully updated blog category.');
      return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blogCategory=BlogCategory::findOrFail($id);
        $blogCategory->delete();

        Session::flash('success','You have succesfully deleted blog category.');
        return redirect()->route('categories.index');
    }
}
