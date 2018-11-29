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

Auth::routes();

Route::resource('/admin_books', 'Admin\BooksResource')->middleware('auth');
Route::resource('/admin_authors', 'Admin\AuthorsResource')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/update/books', 'Admin\SearchUpdateController@books');
Route::get('/update/authors', 'Admin\SearchUpdateController@authors');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');


