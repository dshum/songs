@extends('layout')

@section('title', 'Songs')

@section('content')
<h1><a href="{{ URL::route('home') }}">Songs</a></h1>
<h2><a href="{{ $currentArtist->getHref() }}">{{ $currentArtist->name }}</a></h2>
<h2><a href="{{ $currentAlbum->getHref() }}">{{ $currentAlbum->name }}</a></h2>
<h3>{{ $currentSong->name }}</h3>
<p>
{{ $currentSong->text }}
</p>
@stop