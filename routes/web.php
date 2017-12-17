<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/home',function(){
  return view('index');
});
Route::get('/',function(){
  return view('index');
});
Route::get('/faqs', 'FaqsController@show');
Route::get('/perfil', 'PerfilController@show');
Route::get('/agregar','PostController@agregar');
Route::post('/agregar','PostController@store');



Route::get('/post/{id}','PostController@show');

Route::delete('/post/{id}','PostController@destroy');

Route::get('/post/{id}/edit', 'PostController@edit');
Route::patch('/post/{id}', 'PostController@update');

// Route::get('/perfil', 'PerfilController@edit');
// Route::patch('/perfil', 'PerfilController@update');

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

//Route::get('/home', 'HomeController@index')->name('home');

 // Route::get('/login2', function(){
 //
 //
 // });
//Route::get('/register', 'Auth\RegisterController@show');
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');
