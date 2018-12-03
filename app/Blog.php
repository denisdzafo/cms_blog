<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
  public function users()
  {
      return $this->belongsTo('App\User');
  }

  public function blogCategory()
  {
    return $this->belongsTo('App\BlogCategory');
  }

  public function tags()
  {
    return $this->belongsToMany('App\Tag');
  }

  public function comments()
  {
    return $this->hasMany('App\Comment');
  }
}
