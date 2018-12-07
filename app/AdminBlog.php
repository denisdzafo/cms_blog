<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminBlog extends Model
{
  public function blogCategory()
  {
    return $this->belongsTo('App\BlogCategory');
  }
}
