<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
  protected $fillable = [
    'title',
    'content',
    'blogCategory_id',
    'user_id'
];
  protected $table = 'blogs';

  public function users()
  {
      return $this->belongsTo('App\User','user_id');
  }

  public function blogCategories()
  {
    return $this->belongsTo('App\BlogCategory','blogCategory_id');
  }

  public function tags()
  {
    return $this->belongsToMany('App\Tag');
  }

  public function comments()
  {
    return $this->hasMany('App\Comment','blog_id');
  }
}
