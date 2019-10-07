<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
  public function user(){
    return $this->belongsTo(User::class);//Un video pertenece a un usuario
  }

  public function category(){
    return $this->belongsTo(Category::class);//Un video pertenece a una categoria
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
    return $this->morphToMany(Tag::class, 'taggable');//Un video tiene muchos tag y un tag tiene muchos post
  }
}
