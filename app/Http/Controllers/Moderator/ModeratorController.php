<?php

namespace App\Http\Controllers\Moderator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Moderator;
use Session;
use App\User;
use App\Blog;
use App\BlogCategory;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ModeratorController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:moderator');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      return view('moderator.index');
  }

  public function getUsers()
  {
    $users=User::all();
    return view('moderator.users')->withUsers($users);
  }

  public function moderatorsPrivilege(Request $request, $id)
  {
    $user=User::findOrFail($id);

    $moderator=new Moderator();

    $moderator->username=$user->username;
    $moderator->email=$user->email;
    $moderator->picture=$user->picture;
    $moderator->password=$user->password;
    $moderator->save();

    $user->delete();

    Session::flash('success','User now have Moderator priviledge.');

    return redirect()->route('moderator.users.get');
  }

  public function indexBlog()
  {
    $blogs=Blog::all();
    return view('moderator.blogs.index')->withBlogs($blogs);
  }

  public function editBlog($id)
  {
    $blog=Blog::findOrFail($id);
    $blogCategories=BlogCategory::all();
    $tags=Tag::all();
    return view('moderator.blogs.edit')->withBlog($blog)
                                       ->withblogCategories($blogCategories)
                                       ->withTags($tags);
  }

  public function updateBlog(Request $request,$id)
  {
    $this->validate($request, [
        'title' => 'required|string|max:255',
        'content' => 'required',
        'blogCategory_id'=>'required'
    ]);


      $blog=Blog::findOrFail($id);
      $user = user::find($blog->user_id);

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
      return redirect()->route('moderator.blog');
  }

  public function getPicture($pictureName)
  {
    $filePath=storage_path('storage')."/".$pictureName;
    return response()->download($filePath);
  }

  public function editProfile()
  {
    $moderator=Auth::guard('moderator')->user();
    return view('moderator.edit-profile')->withModerator($moderator);
  }

  public function editProfileSubmit(Request $request,$id)
  {

      $moderator=Moderator::findOrFail($id);
      if ( $request->password) {

        $this->validate($request, array(
            'username'=>'required',
            'picture'=>'file',
            'password'=> 'string|min:6|confirmed'
        ));
        //Set the data
        $moderator->username=$request->username;
        $moderator->info=$request->info;
        $moderator->password=Hash::make($request->password);

      }
      else{
        $this->validate($request, array(
          'username'=>'required',
          'picture'=>'file',
      ));
      //Set the data
      $moderator->username=$request->username;
      $moderator->info=$request->info;
      }
      if ( $request->picture) {
          Storage::delete($moderator->picture);
          $fileName = $moderator->id."_".date('mdY_his').'.'.request()->picture->getClientOriginalExtension();
          $path = $request->file('picture')->storeAs('moderators', $fileName);
          $moderator->picture = $path;
      }
      $moderator->save();
      Session::flash('success', "Your profile has been successfully updated.");
      return redirect()->route('moderator.edit.profile');
  }
}
