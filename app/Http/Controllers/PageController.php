<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\AdminBlog;
class PageController extends Controller
{

    public function getIndex()
    {
      $blogs=AdminBlog::take(3)->get();
      return view('pages.index')->withBlogs($blogs);
    }

    public function getBlog()
    {
      $blogs=Blog::all();
      return view('pages.blog')->withBlogs($blogs);
    }

    public function getAbout()
    {
      return view('pages.about');
    }

    public function getAuthor()
    {
      return view('pages.author');
    }

    public function getContact()
    {
      return view('pages.contact');
    }
}
