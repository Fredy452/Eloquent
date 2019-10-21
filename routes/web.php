<?php
use App\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $users = App\User::get();//consulta para obtener el usuario de la base de datos

    return view('welcome', ['users' => $users]);
});

//Route profile
    Route::get('/profile/{id}', function($id) {//patch de profile y el id que recibe por parametro un idea

      $user = App\User::find($id);//Buscamos al usuario que recibimos por parametro

      $posts = $user->posts()
        ->with('category', 'image', 'tags')
        ->withCount('comments')->get();//para contar comentarios

      $videos = $user->videos()
        ->with('category', 'image', 'tags')
        ->withCount('comments')->get();

    return view('profile', [
      'user' => $user,
      'posts' => $posts,
      'videos' => $videos
    ]);

    })->name('profile');

    //Route level
        Route::get('/level/{id}', function($id) {//patch de profile y el id que recibe por parametro un idea

          $level = App\Level::find($id);//Buscamos al usuario que recibimos por parametro

          $posts = $level->posts()
            ->with('category', 'image', 'tags')
            ->withCount('comments')->get();//para contar comentarios

          $videos = $level->videos()
            ->with('category', 'image', 'tags')
            ->withCount('comments')->get();

        return view('level', [
          'level' => $level,
          'posts' => $posts,
          'videos' => $videos
        ]);

      })->name('level');
