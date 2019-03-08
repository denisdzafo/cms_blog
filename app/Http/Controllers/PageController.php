<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\AdminBlog;
use App\Testimonial;
use App\Comment;
class PageController extends Controller
{

    public function getIndex()
    {
      $blogs=AdminBlog::take(3)->get();
      $testimonials=Testimonial::all();
      return view('pages.index')->withBlogs($blogs)->withTestimonials($testimonials);
    }

    public function getBlog()
    {
      $blogs=Blog::with('blogCategories')->get();
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

    public function getSingleBlog($id)
    {
      $blog=Blog::find($id);
      $comment=Comment::where('blog_id','=',$id)->get();
      $blogs=Blog::where('blogCategory_id','=',$blog->blogCategory_id)->where('id','!=',$id)->get();
      return view('pages.single-blog')->withBlog($blog)->withComments($comment)->withBlogs($blogs);
    }
}
