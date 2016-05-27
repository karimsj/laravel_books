<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('api/books', 'BookController@index');
Route::get('api/book/{id}', 'BookController@get');
Route::put('api/book/{id}', 'BookController@update');
Route::delete('api/book/{id}', 'BookController@delete');
Route::post('api/book', 'BookController@insert');

Route::get('api/authors', 'AuthorController@index');
Route::get('api/author/{id}', 'AuthorController@get');
Route::put('api/author/{id}', 'AuthorController@update');
Route::delete('api/author/{id}', 'AuthorController@delete');
Route::post('api/author', 'AuthorController@insert');

Route::get('api/publishers', 'PublisherController@index');
Route::get('api/publisher/{id}', 'PublisherController@get');
Route::put('api/publisher/{id}', 'PublisherController@update');
Route::delete('api/publisher/{id}', 'PublisherController@delete');
Route::post('api/publisher', 'PublisherController@insert');