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

    return view('profile', [
      'user' => $user
    ]);

    })->name('profile');
