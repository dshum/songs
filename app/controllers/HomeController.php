<?php

use Carbon\Carbon;

class HomeController extends BaseController {

	public function postLogin()
	{
		return Redirect::back();
	}

	public function getLogout()
	{
		return Redirect::back();
	}

	public function getSong($id)
	{
		$scope = array();

		try {
			$currentSong = Song::find($id);
			$currentAlbum = $currentSong->album;
			$currentArtist = $currentAlbum->artist;
		} catch (Exception $e) {
			return Redirect::route('home');
		}

		View::share('currentSong', $currentSong);
		View::share('currentAlbum', $currentAlbum);
		View::share('currentArtist', $currentArtist);

		return View::make('song', $scope);
	}

	public function getAlbum($id)
	{
		$scope = array();

		try {
			$currentAlbum = Album::find($id);
			$currentArtist = $currentAlbum->artist;
		} catch (Exception $e) {
			return Redirect::route('home');
		}

		View::share('currentAlbum', $currentAlbum);
		View::share('currentArtist', $currentArtist);

		$songList = Song::where('album_id', $currentAlbum->id)->
			orderBy('number')->get();

		$scope['songList'] = $songList;

		return View::make('album', $scope);
	}

	public function getArtist($id)
	{
		$scope = array();

		try {
			$currentArtist = Artist::find($id);
		} catch (Exception $e) {
			return Redirect::route('home');
		}

		View::share('currentArtist', $currentArtist);

		$albumList = Album::where('artist_id', $currentArtist->id)->
			orderBy('year')->orderBy('name')->get();

		$scope['albumList'] = $albumList;

		return View::make('artist', $scope);
	}

	public function getIndex()
	{
		$scope = array();

		$artistList = Artist::orderBy('name')->get();

		$scope['artistList'] = $artistList;

		return View::make('home', $scope);
	}

}
