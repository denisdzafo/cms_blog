<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
  protected $fillable = [
    'category'    
];
    protected $table = 'blog_categories';

    public function blogs()
    {
      return $this->hasMany('App\Blog');
    }

    public function adminBlogs()
    {
      return $this->hasMany('App\AdminBlog');
    }
}
