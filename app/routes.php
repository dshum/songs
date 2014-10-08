<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@getIndex'));

Route::get('/search', array('as' => 'search', 'uses' => 'HomeController@getSearch'));

Route::get('/add', array('as' => 'add', 'uses' => 'HomeController@getAdd'));
Route::post('/add', array('as' => 'add', 'uses' => 'HomeController@postAdd'));

Route::get('/hint', array('as' => 'hint', 'uses' => 'HomeController@getHint'));

Route::get('/artists', array('as' => 'artists', 'uses' => 'HomeController@getIndex'));
Route::get('/albums', array('as' => 'albums', 'uses' => 'HomeController@getIndex'));
Route::get('/songs', array('as' => 'songs', 'uses' => 'HomeController@getIndex'));

Route::get('/artists/{id}', array('as' => 'artist', 'uses' => 'HomeController@getArtist'));
Route::get('/albums/{id}', array('as' => 'album', 'uses' => 'HomeController@getAlbum'));
Route::get('/songs/{id}', array('as' => 'song', 'uses' => 'HomeController@getSong'));

Route::get('/edit/{id}', array('as' => 'edit', 'uses' => 'HomeController@getEdit'));
Route::post('/save/{id}', array('as' => 'save', 'uses' => 'HomeController@postSave'));