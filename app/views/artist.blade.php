@extends('layout')

@section('title', $currentArtist->name)

@section('content')
<h2><span>{{ $currentArtist->name }}</span></h2>
<p>
@foreach ($songList as $song)
<a href="{{ $song->getHref() }}">{{ $song->name }}</a><br />
@endforeach
</p>
@stop