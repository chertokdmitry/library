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

Route::get('/', 'IndexController@index');
Route::get('/search',['uses' => 'SearchController@getSearch','as' => 'search']);
Route::get('/allauthors', 'AuthorsController@index');

//Route::delete('books/{id}', [
//    'as' => 'delete_book',
//    'uses' => 'Admin\BooksResource@destroy'
//]);

Route::resource('/admin_books', 'Admin\BooksResource')->middleware('auth');
Route::resource('/admin_authors', 'Admin\AuthorsResource')->middleware('auth');

Auth::routes();

//Route::get('/users', ['middleware' => ['auth'], 'uses'=>'Core@show']);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/update/books', 'Admin\SearchUpdateController@books');
Route::get('/update/authors', 'Admin\SearchUpdateController@authors');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');


