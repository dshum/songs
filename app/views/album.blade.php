@extends('layout')

@section('title', $currentAlbum->name)

@section('content')
<h1><a href="{{ URL::route('home') }}">Songs</a></h1> <h2>{{ $currentAlbum->name }}</h2>
<p>Исполнитель: <a href="{{ $currentArtist->getHref() }}">{{ $currentArtist->name }}</a></p>
<p>
@foreach ($songList as $song)
<small class="grey">{{ $song->number }}</small> <a href="{{ $song->getHref() }}">{{ $song->name }}</a><br />
@endforeach
</p>
@stop