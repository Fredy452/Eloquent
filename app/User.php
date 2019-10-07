<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //Relacion del usuario con el perfil
    //Un usuario solo puede tener un perfil
    public function profile(){//El metodo profile es en singular ya que un usuario va a tener un solo perfil
      return $this->hasOne(Profile::class);//un usuario tiene un perfil
    }

    public function level(){
      return $this->belongsTo(Level::class);//Un nivel pertenece a un usuario
    }

    public function groups(){//Es en singular porque es mucho amucho
      return $this->belongsToMany(Group::class)->withTimestamps();//Un usuario pertenece a un grupo y a la ves tiene muchos grupos
    }

    public function location(){
      return $this->hasOneThrough(Location::class, Profile::class);//Tengo una localizacion a traves de perfil
    }

    //Un usuario tiene muchos
    public function posts(){
      return $this->hasMany(Post::class);
    }

    public function videos(){
      return $this->hasMany(Video::class);
    }

    public function comments(){
      return $this->hasMany(Comment::class);
    }

    //Un perfil tiene una imagen
    public function image(){
      return $this->morphOne(Image::class, 'imageable');
    }
}
