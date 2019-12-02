<?php

use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

Route::get('/redirect', function (Request $request) {
    $request->session()->put('state', $state = Str::random(40));

    $query = http_build_query([
        'client_id' => '4',
        'redirect_uri' => 'http://library.loc/callback',
        'response_type' => 'code',
        'scope' => '*',
        'state' => $state,
    ]);

    return redirect('http://trains.loc/oauth/authorize?'.$query);
});

Auth::routes();

Route::get('/callback', function (Request $request) {
    $http = new GuzzleHttp\Client;

    $response = $http->post('http://trains.loc/oauth/token', [
        'form_params' => [
            'grant_type' => 'authorization_code',
            'client_id' => '4',
            'client_secret' => 'I8XoS8XwQz57mTtGCh3ctQWPhQkR516lmRvtzY2h',
            'redirect_uri' => 'http://library.loc/callback',
            'code' => $request->code,
        ],
    ]);

    return json_decode((string) $response->getBody(), true);
});


Route::resource('/admin_books', 'Admin\BooksResource')->middleware('auth');
Route::resource('/admin_authors', 'Admin\AuthorsResource')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/update/books', 'Admin\SearchUpdateController@books');
Route::get('/update/authors', 'Admin\SearchUpdateController@authors');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');


