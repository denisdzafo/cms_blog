<?php

namespace App\Http\Controllers\Moderator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Moderator;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class ModeratorLoginController extends Controller
{
  use AuthenticatesUsers;
  public function __construct()
  {
    $this->middleware('guest:moderator', ['except' => ['logout']]);
  }

  public function getLoginForm()
  {
    return view('moderator.login');
  }

  public function submitLogin(Request $request)
  {
      // Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
      ]);


      // Attempt to log the user in
      if (Auth::guard('moderator')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        // if successful, then redirect to their intended location
        return redirect()->intended(route('moderator.dashboard'));
      }
  // if unsuccessful, then redirect back to the login with the form data
  return redirect()->back()->withInput($request->only('email', 'remember'));
  }
}
