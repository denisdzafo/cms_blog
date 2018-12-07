<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  public function blogCategory()
  {
    return $this->belongsTo('App\Blog');
  }

  public function users()
  {
    return $this->belongsTo('App\User');
  }
}
