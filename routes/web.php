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
    return view('welcome');
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

// Route::get("/post/delete/{id}", function($id) {
// 	$post = Post::findOrFail($id);
// 	$post->delete();
// 	return redirect('/post');
// });

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
