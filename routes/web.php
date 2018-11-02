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
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/

//Route::view('/', 'welcome');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'ForumsController@index');
Route::get('/forums/{forum}','ForumsController@show');
Route::post('/forums', 'ForumsController@store');

Route::get('/posts/{post}', 'PostsController@show');
Route::post('/posts', 'PostsController@store');

Route::post('/replies', 'RepliesController@store');

//para mostrar las imagenes

Route::get('/images/{path}/{attachment}', function($path, $attachment) {
	$storagePath = Storage::disk($path)->getDriver()->getAdapter()->getPathPrefix();
	$imageFilePath = $storagePath . $attachment;

	if(File::exists($imageFilePath)) {
		return Image::make($imageFilePath)->response();
	}
});


