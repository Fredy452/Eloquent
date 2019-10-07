<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  public function posts(){
    return $this->morphedByMany(Post::class, 'taggable');//relacion polimorfica inversa
  }

  public function videos(){
    return $this->morphedByMany(Video::class, 'taggable');//Una etiqueta tiene muchos videos
  }
}
