<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  public function commentable(){
    return $this->morphTo();//relacion polimorfica uno a uno
  }

  public function user(){
    return $this->belongsTo(User::class);//Un comentario pertenece a un usuario
  }
}
