<?php

use Illuminate\Database\Seeder;
use App\Tag;
use App\Post;
use App\Group;
use App\Profile;
use App\Location;
use App\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Lenado de la base de datos con datos falsos a  traves de Seeder
        factory(App\Group::class, 3)->create();

        factory(App\Level::class)->create(['name' => 'Oro']);
        factory(App\Level::class)->create(['name' => 'Plata']);
        factory(App\Level::class)->create(['name' => 'Bronce']);

        //Creando datos del usuario
        factory(App\User::class, 5)->create()->each(function ($user) {

          $profile = $user->profile()->save(factory(App\Profile::class)->make());//Guardamos un perfil por cada usuario que creamos

          $profile->location()->save(factory(App\Location::class)->make());//Por cada perfil tambien creamos un array de localizacion

          $user->groups()->attach($this->array(rand(1,3)));//El metodo array nos debuelve un numero del 1 al 3 para seleccionar un grupo

          $user->image()->save(factory(App\Image::class)->make([//guardamos una imagen de forma personalizada por cada usuario
            'url' => 'https://lorempixel.com/90/90/'
          ]));

        });

        //Categoria y tag
        factory(App\Category::class, 4)->create();
        factory(App\Tag::class, 12)->create();

        //Creacion de post con sus correspondientes relaciones
        factory(App\Post::class, 40)->create()->each(function ($post){

          $post->image()->save(factory(App\Image::class)->make());//Por cada post se asigna una imagen
          $post->tags()->attach($this->array(rand(1,12)));//Para asignas los tag aleatoriamene

          $number_comments = rand(1,6);

          for ($i=0; $i < $number_comments; $i++) {
            $post->comments()->save(factory(App\Comment::class)->make());
          }

        });

        //Creacion de video con sus correspondientes relaciones
        factory(App\Video::class, 40)->create()->each(function ($video){

          $video->image()->save(factory(App\Image::class)->make());//Por cada video se asigna una imagen
          $video->tags()->attach($this->array(rand(1,12)));//Para asignas los tag aleatoriamene

          $number_comments = rand(1,6);

          for ($i=0; $i < $number_comments; $i++) {
            $video->comments()->save(factory(App\Comment::class)->make());
          }

        });

    }

    public function array($max)  { //Metodo array que debuelve un valor

      $values = [];

      for ($i=1; $i < $max ; $i++) {
        $values[] = $i;
      }

      return $values;
    }
}
