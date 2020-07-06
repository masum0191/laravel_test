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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'WelcomeController@index');
Route::get('detials/{id}', 'WelcomeController@show');
Route::get('detials_vedio/{id}', 'WelcomeController@show_vedio');


Auth::routes();
Route::group(['middleware' => ['auth']], function() {
    Route::resource('posts','PostController');
    Route::resource('vedio','VedioController');
    Route::post('setpostapproval', 'PostController@setapproval');
    Route::post('setvedioapproval', 'VedioController@setapproval');
  
});

Route::get('/home', 'HomeController@index')->name('home');
