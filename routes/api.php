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

Route::get('authors','Api\AuthorController@index');
Route::post('author/store','Api\AuthorController@store');
Route::get('author/{id}','Api\AuthorController@show');
Route::put('author/{id}','Api\AuthorController@update');
Route::delete('author/{id}','Api\AuthorController@destroy');

Route::get('books','Api\BookController@index');
Route::post('book/store','Api\BookController@store');
Route::get('book/{id}','Api\BookController@show');
Route::put('book/{id}','Api\BookController@update');
Route::delete('book/{id}','Api\BookController@destroy');

Route::post('books/{book}/ratings', 'Api\RatingController@store');