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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'IndexController@index');

Route::get('/about', function () {
    return view('default');
});

Route::delete('books/{id}', [
    'as' => 'delete_book',
    'uses' => 'Admin\BooksResource@destroy'
]);

Route::resource('/books', 'Admin\BooksResource')->middleware('auth');
Route::resource('/authors', 'Admin\AuthorsResource')->middleware('auth');

Auth::routes();

Route::get('/users', ['middleware' => ['auth'], 'uses'=>'Core@show']);

//Route::get('/pages/add', 'Admin\CoreResource@add');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');


