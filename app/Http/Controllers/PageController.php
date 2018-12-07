<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
class PageController extends Controller
{
    public function getBlog()
    {
      $blogs=Blog::all();
      return view('pages.blog')->withBlogs($blogs);
    }
}
