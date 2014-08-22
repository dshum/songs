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

	public function getHint()
	{
		$scope = array();

		$term = \Input::get('term');

		$artistListCriteria = Artist::query();

		if ($term) {
			$artistListCriteria->where('name', 'ilike', '%'.$term.'%');
		}

		$artistList =
			$artistListCriteria->
			orderBy('name')->
			limit(10)->
			get();

		foreach ($artistList as $artist) {
			$scope[] = array(
				'id' => $artist->id,
				'value' => $artist->name,
			);
		}

		return json_encode($scope);
	}

	public function postSave($id)
	{
		$scope = array();

		try {
			$currentSong = Song::find($id);
			$currentArtist = $currentSong->artist;
		} catch (Exception $e) {
			return Redirect::route('home');
		}

		$artistName = Input::get('artist');
		$songName =  Input::get('song');
		$songText =  Input::get('text');

		$input = Input::all();

		$rules = array(
			'artist' => 'required|not_in:Исполнитель',
			'song' => 'required|not_in:Название',
			'text' => 'required|not_in:Текст',
		);

		$messages = array(
			'artist.not_in' => 'artist',
			'artist.required' => 'artist',
			'song.required' => 'song',
			'song.not_in' => 'song',
			'text.required' => 'text',
			'text.not_in' => 'text',
		);

		$validator = Validator::make($input, $rules, $messages);

		if ($validator->fails()) {

			View::share('currentSong', $currentSong);
			View::share('currentArtist', $currentArtist);

			$messages = $validator->messages();

			$scope['error'] = $messages->all();
			$scope['artistName'] = $input['artist'];
			$scope['songName'] = $input['song'];
			$scope['songText'] = $input['text'];

			return View::make('edit', $scope);

		}

		$currentSong->name = $input['song'];
		$currentSong->text = $input['text'];

		$artist = Artist::where('name', $input['artist'])->first();

		if ( ! $artist instanceof Artist) {
			$artist = new Artist;
			$artist->name = $input['artist'];
			$artist->save();
		}

		$currentSong->artist_id = $artist->id;

		$currentSong->save();

		return Redirect::route('song', $currentSong->id);
	}

	public function postAdd()
	{
		$scope = array();

		$artistName = Input::get('artist');
		$songName =  Input::get('song');
		$songText =  Input::get('text');

		$input = Input::all();

		$rules = array(
			'artist' => 'required|not_in:Исполнитель',
			'song' => 'required|not_in:Название',
			'text' => 'required|not_in:Текст',
		);

		$messages = array(
			'artist.not_in' => 'artist',
			'artist.required' => 'artist',
			'song.required' => 'song',
			'song.not_in' => 'song',
			'text.required' => 'text',
			'text.not_in' => 'text',
		);

		$validator = Validator::make($input, $rules, $messages);

		if ($validator->fails()) {

			$messages = $validator->messages();

			$scope['error'] = $messages->all();
			$scope['artistName'] = $input['artist'];
			$scope['songName'] = $input['song'];
			$scope['songText'] = $input['text'];

			return View::make('add', $scope);

		}

		$song = new Song;

		$song->name = $input['song'];
		$song->text = $input['text'];

		$artist = Artist::where('name', $input['artist'])->first();

		if ( ! $artist instanceof Artist) {
			$artist = new Artist;
			$artist->name = $input['artist'];
			$artist->save();
		}

		$song->artist_id = $artist->id;

		$song->save();

		return Redirect::route('song', $song->id);
	}

	public function getEdit($id)
	{
		$scope = array();

		try {
			$currentSong = Song::find($id);
			$currentArtist = $currentSong->artist;
		} catch (Exception $e) {
			return Redirect::route('home');
		}

		View::share('currentSong', $currentSong);
		View::share('currentArtist', $currentArtist);

		$scope['error'] = array();
		$scope['artistName'] = $currentArtist->name;
		$scope['songName'] = $currentSong->name;
		$scope['songText'] = $currentSong->text;

		return View::make('edit', $scope);
	}

	public function getAdd()
	{
		$scope = array();

		$scope['error'] = array();
		$scope['artistName'] = null;
		$scope['songName'] = null;
		$scope['songText'] = null;

		return View::make('add', $scope);
	}

	public function getSearch()
	{
		$scope = array();

		$q = Input::get('q');

		$songList =
			Song::where(
				function($query) use ($q) {
					if ($q) {
						$query->
						orWhere('name', 'ilike', "%$q%")->
						orWhere('text', 'ilike', "%$q%");
					}
				}
			)->
			orderBy('name')->get();

		$scope['songList'] = $songList;

		return View::make('search', $scope);
	}

	public function getSong($id)
	{
		$scope = array();

		try {
			$currentSong = Song::find($id);
			$currentArtist = $currentSong->artist;
		} catch (Exception $e) {
			return Redirect::route('home');
		}

		View::share('currentSong', $currentSong);
		View::share('currentArtist', $currentArtist);

		return View::make('song', $scope);
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

		$songList = Song::where('artist_id', $currentArtist->id)->
			orderBy('name')->get();

		$scope['songList'] = $songList;

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
