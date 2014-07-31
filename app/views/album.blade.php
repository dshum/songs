@extends('layout')

@section('title', 'Songs')

@section('content')
<h1><a href="{{ URL::route('home') }}">Songs</a></h1> <h2><a href="{{ $currentArtist->getHref() }}">{{ $currentArtist->name }}</a></h2> <h3>{{ $currentAlbum->name }}</h3>
<p>
@foreach ($songList as $song)
<a href="{{ $song->getHref() }}">{{ $song->name }}</a><br />
@endforeach
</p>
@stop