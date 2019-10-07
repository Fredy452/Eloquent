<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  public function user(){
    return $this->belongsTo(User::class);//Un Post pertenece a un usuario
  }

  public function category(){
    return $this->belongsTo(Category::class);//Un Post pertenece a una categoria
  }

  //Relaciones polimorficas
  public function comments(){
    //hasMany  Polimorfica
    return $this->morphMany(Comment::class, 'commentable');//Relacion polimorfica con comentqario
  }

  public function image(){
    return $this->morphOne(Image::class, 'imageable');
  }

  public function tags(){
    return $this->morphToMany(Tag::class, 'taggable');//Un post tiene muchos tag y un tag tiene muchos post
  }
}
