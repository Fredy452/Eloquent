<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  public function posts(){
    return $this->haMany(Post::class);//Una categoria tiene muchos post
  }

  public function videos(){//Es en plural porque es mucho a mucho
    return $this->haMany(Post::class);//Una categoria tiene muchos videos
  }
}
