<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\User;
use Session;
use App\Comment;
class UserController extends Controller
{
    public function index()
    {
      $user=Auth::user();
      return view('user.index')->withUser($user);
    }
    public function editProfile()
    {
      $user=Auth::guard('web')->user();
      return view('user.edit-profile')->withUser($user);
    }

    public function editProfileSubmit(Request $request,$id)
    {
        $user=User::findOrFail($id);
        if ( $request->password) {
          $this->validate($request, array(
              'username'=>'required',
              'picture'=>'file',
              'password'=> 'string|min:6|confirmed'
          ));

          $user->username=$request->username;
          $user->info=$request->info;
          $user->password=Hash::make($request->password);

        }
        else{
          $this->validate($request, array(
            'username'=>'required',
            'picture'=>'file',
        ));

        $user->username=$request->username;
        $user->info=$request->info;
        }
        if ( $request->picture) {
            Storage::delete($user->picture);
            $fileName = $user->id."_".date('mdY_his').'.'.request()->picture->getClientOriginalExtension();
            $path = $request->file('picture')->storeAs('users', $fileName);
            $user->picture = $path;
        }
        $user->save();
        Session::flash('success', "Your profile has been successfully updated.");
        return redirect()->route('user.edit.profile');
    }

    public function getComments()
    {
      $id=Auth::guard('web')->id();
      $comments=Comment::where('user_id','=',$id)->paginate(5);
      return view('user.comments')->withComments($comments);
    }
}
