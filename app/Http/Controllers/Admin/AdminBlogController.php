<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminBlog;
use App\BlogCategory;
Use Session;

class AdminBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $blogs=AdminBlog::all();
      return view('admin.blogs.index')->withBlogs($blogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $blogCategories=BlogCategory::all();
      return view('admin.blogs.create')->withblogCategories($blogCategories);

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
          'title' => 'required|string|max:255',
          'content' => 'required',
          'blogCategory_id'=>'required'
      ]);

      ;
        $blog=new AdminBlog();
        $blog->title=$request->title;
        $blog->content=$request->content;
        $blog->blogCategory_id=$request->blogCategory_id;

        if ( $request->picture) {
            $title=str_replace(' ', '_', $request->title);
            $fileName = $title."_".date('mdY_his').'.'.request()->picture->getClientOriginalExtension();
            $path = $request->file('picture')->storeAs('adminBlog', $fileName);
            $blog->picture = $path;
        }
        $blog->save();

        Session::flash('success', "Blog has been successfully created.");
        return redirect()->route('adminBlogs.index');
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
      $blog=AdminBlog::findOrFail($id);
      $blogCategories=BlogCategory::all();
      return view('admin.blogs.edit')->withBlog($blog)
                                    ->withblogCategories($blogCategories);
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
          'title' => 'required|string|max:255',
          'content' => 'required',
          'blogCategory_id'=>'required'
      ]);

        $blog=AdminBlog::findOrFail($id);
        $blog->title=$request->title;
        $blog->content=$request->content;
        $blog->blogCategory_id=$request->blogCategory_id;

        if ( $request->picture) {
            Storage::delete($blog->picture);
            $title=str_replace(' ', '_', $request->title);
            $fileName = $title."_".date('mdY_his').'.'.request()->picture->getClientOriginalExtension();
            $path = $request->file('picture')->storeAs('adminBlog', $fileName);
            $blog->picture = $path;
        }
        $blog->save();
        Session::flash('success', "Blog has been has been successfully updated.");
        return redirect()->route('adminBlogs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $blog=AdminBlog::findOrFail($id);
      $blog->delete();

      Session::flash('success','You have succesfully deleted a blog.');
      return redirect()->route('adminBlogs.index');
    }
}
