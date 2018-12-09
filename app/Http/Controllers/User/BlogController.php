<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blog;
use Session;
use App\BlogCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Tag;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $id = Auth::guard('web')->id();
      $blogs=Blog::where('user_id','=',$id)->get();
      return view('user.blogs.index')->withBlogs($blogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blogCategories=BlogCategory::all();
        $tags=Tag::all();
        return view('user.blogs.create')->withblogCategories($blogCategories)
                                        ->withTags($tags);
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

          $user = Auth::guard('web')->user();
          $blog=new Blog();
          $blog->title=$request->title;
          $blog->content=$request->content;
          $blog->user_id=$user->id;
          $blog->blogCategory_id=$request->blogCategory_id;

          if ( $request->picture) {
              $fileName = $user->id."_".date('mdY_his').'.'.request()->picture->getClientOriginalExtension();
              $path = $request->file('picture')->storeAs('userBlog', $fileName);
              $blog->picture = $path;
          }
          $blog->save();
          if ( $request->tags != NULL ) {
              $blog->tags()->attach($request->tags);
          }

          Session::flash('success', "Blog has been successfully created.");
          return redirect()->route('blogs.index');
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
        $blog=Blog::findOrFail($id);
        $blogCategories=BlogCategory::all();
        $tags=Tag::all();
        return view('user.blogs.edit')->withBlog($blog)
                                      ->withblogCategories($blogCategories)
                                      ->withTags($tags);
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

          $user = Auth::guard('web')->user();
          $blog=Blog::findOrFail($id);
          $blog->title=$request->title;
          $blog->content=$request->content;
          $blog->blogCategory_id=$request->blogCategory_id;

          if ( $request->picture) {
              Storage::delete($blog->picture);
              $fileName = $user->id."_".date('mdY_his').'.'.request()->picture->getClientOriginalExtension();
              $path = $request->file('picture')->storeAs('userBlog', $fileName);
              $blog->picture = $path;
          }
          $blog->save();
          if ( $request->tags != NULL ) {
            $blog->tags()->sync($request->tags);
          }
          Session::flash('success', "Blog has been successfully updated.");
          return redirect()->route('blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $blog=Blog::findOrFail($id);
      $blog->delete();

      Session::flash('success','You have succesfully deleted a blog.');
      return redirect()->route('blogs.index');
    }
}
