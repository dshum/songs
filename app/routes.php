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

Route::get('/artists', array('as' => 'artists', 'uses' => 'HomeController@getArtists'));
Route::get('/albums', array('as' => 'albums', 'uses' => 'HomeController@getAlbums'));
Route::get('/songs', array('as' => 'songs', 'uses' => 'HomeController@getSongs'));

Route::get('/artists/{id}', array('as' => 'artist', 'uses' => 'HomeController@getArtist'));
Route::get('/albums/{id}', array('as' => 'album', 'uses' => 'HomeController@getAlbum'));
Route::get('/songs/{id}', array('as' => 'song', 'uses' => 'HomeController@getSong'));
