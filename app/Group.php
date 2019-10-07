<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
  public function users(){//Es en singular porque es mucho amucho
    return $this->belongsToMany(User::class)->withTimestamps();//Un grupo tiene y pertenece a muchos usuarios
  }
}
