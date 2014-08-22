@extends('layout')

@section('title', $currentSong->name)

@section('content')
<h2><a href="{{ $currentArtist->getHref() }}">{{ $currentArtist->name }}</a></h2>
<h3><span>{{ $currentSong->name }}</span><a href="{{ URL::route('edit', $currentSong->id) }}" class="add">...</a></h3>
<p>{{ nl2br($currentSong->text) }}</p>
@stop