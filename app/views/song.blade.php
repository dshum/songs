@extends('layout')

@section('title', $currentSong->name)

@section('content')
<h1><a href="{{ URL::route('home') }}">Songs</a></h1>
<h2>{{ $currentSong->name }}</h2>
<p>Исполнитель: <a href="{{ $currentArtist->getHref() }}">{{ $currentArtist->name }}</a><br />
Альбом: <a href="{{ $currentAlbum->getHref() }}">{{ $currentAlbum->name }}</a></p>
<p>
{{ nl2br($currentSong->text) }}
</p>
@stop