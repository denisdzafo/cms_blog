<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Moderator;
use Session;

class AdminUsersController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:admin');
    }

    public function getUsers()
    {
      $users=User::all();
      return view('admin.users')->withUsers($users);
    }

    public function moderatorsPrivilege(Request $request, $id)
    {
      $user=User::findOrFail($id);

      $moderator=new Moderator();

      $moderator->username=$user->username;
      $moderator->email=$user->email;
      $moderator->password=$user->password;
      $moderator->save();

      $user->delete();

      Session::flash('success','User now have Moderator priviledge.');

      return redirect()->route('admin.users.get');
    }
}
