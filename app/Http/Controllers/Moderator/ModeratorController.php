<?php

namespace App\Http\Controllers\Moderator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
