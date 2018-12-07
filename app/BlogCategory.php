<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    public function blogs()
    {
      return $this->hasMany('App\Blog');
    }

    public function adminBlogs()
    {
      return $this->hasMany('App\AdminBlog');
    }
}
