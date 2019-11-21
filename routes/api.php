<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register','Api\AuthController@register');
Route::post('login','Api\AuthController@login');
Route::get('users','Api\AuthController@index');

Route::get('authors','Api\BookController@index');
Route::post('authors/store','Api\AuthorController@store');
Route::get('authors/{id}','Api\AuthorController@show');
Route::put('authors/{id}','Api\AuthorController@update');
Route::delete('authors/{id}','Api\AuthorController@destroy');

Route::get('books','Api\BookController@index');
Route::post('books/store','Api\BookController@store');
Route::get('books/{id}','Api\BookController@show');
Route::put('books/{id}','Api\BookController@update');
Route::delete('books/{id}','Api\BookController@destroy');

Route::post('books/{book}/ratings', 'Api\RatingController@store');