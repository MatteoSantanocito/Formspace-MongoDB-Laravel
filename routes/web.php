<?php

use Illuminate\Support\Facades\Route;

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


//definiamo la route di registrazione
//ci porta dentro un controller che avvia la funzione register_form
//i dati li mandiamo tramite post e li gestiamo in un altra Route
Route::post('/signup', "App\\Http\\Controllers\\RegisterController@create");
Route::get('/signup', "App\\Http\\Controllers\\RegisterController@signup")->name("signup");
//endpoint delle mie fetch in signup.js
Route::get('/signup/username/{username}', "App\\Http\\Controllers\\RegisterController@checkUsername"); //stiamo passando il valore username che viene preso dalla route
Route::get('/signup/email/{email}', "App\\Http\\Controllers\\RegisterController@checkEmail");

Route::get('/login', "App\\Http\\Controllers\\LoginController@login")->name("login");
Route::get('/logout', "App\\Http\\Controllers\\LoginController@logout")->name("logout");
Route::post('/login', "App\\Http\\Controllers\\LoginController@checkLogin");

Route::get('/profile', "App\\Http\\Controllers\\ProfileController@index")->name("profile");

Route::post('/profile/createPost', "App\\Http\\Controllers\\PostController@createPost")->name("createPost");
Route::post('/profile/modifyPost', "App\\Http\\Controllers\\PostController@modifyPost")->name("modifyPost");
Route::get('/profile/deletePost/{id}', "App\\Http\\Controllers\\PostController@deletePost")->name("deletePost");

Route::get('/home',  "App\\Http\\Controllers\\HomeController@index")->name("home");

Route::get('/post/get/{home?}', "App\\Http\\Controllers\\PostController@getPosts");
Route::get('/post/addlike/{user}/{id}', "App\\Http\\Controllers\\PostController@addLike");
Route::get('/post/removelike/{user}/{post_id}', "App\\Http\\Controllers\\PostController@removeLike");
Route::post('/post/addcomment', "App\\Http\\Controllers\\PostController@addComment");
Route::get('/post/getcomment/{post_id}', "App\\Http\\Controllers\\PostController@getComment");

Route::get('/spotify_track/{track}', "App\\Http\\Controllers\\ProfileController@spotify_track");
Route::get('/spotify_track/{track}', "App\\Http\\Controllers\\HomeController@spotify_track");

Route::get('/load_note', "App\\Http\\Controllers\\HomeController@load_note");
Route::get('/createNote/{note}', "App\\Http\\Controllers\\HomeController@createNote");
