<?php

use Illuminate\Support\Facades\Auth;
use App\Post;
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
    // return view('welcome');
    return redirect('/home');
});

Auth::routes(['verify' => true]);

Route::get('/logout', function() {
    Auth::logout();
    return redirect('/login');
});


// Route::get("/home", function() {
// 	return view('home');
// })->middleware('verified');

Route::resource('posts','PostController');

Route::resource('categories','CategoryController');

Route::get('categories/posts/{id}','CategoryController@showPosts');

Route::delete('category/delete', 'CategoryController@delete')->name('categories.delete');

// Route::get("/post/delete/{id}", function($id) {
// 	$post = Post::findOrFail($id);
// 	$post->delete();
// 	return redirect('/post');
// });

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/profile','UserController@getUserData');

Route::put('/profile_picture/update/{id}', 'UserController@profile_picture_update')->name('profile_picture.update');

Route::get('/users', 'UserController@index');

Route::get('/users/create', 'UserController@create')->name('users.create');

Route::post('/users', 'UserController@store')->name('users.store');

Route::get('/users/edit/{id}','UserController@edit')->name('users.edit');

Route::put('/users/{user}','UserController@update')->name('users.update');

// Route::delete('/users/{id}', 'UserController@destroy')->name('users.destroy');

Route::delete('/users/delete', 'UserController@delete')->name('users.delete');



Route::get('/medias', 'MediaController@index')->name('media.index');
