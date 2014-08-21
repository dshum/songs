@extends('layout')

@section('title', $currentArtist->name)

@section('content')
<h1><a href="{{ URL::route('home') }}">Songs</a></h1> <h2>{{ $currentArtist->name }}</h2>
<p>
@foreach ($albumList as $album)
<small class="grey">{{ $album->year }}</small> <a href="{{ $album->getHref() }}">{{ $album->name }}</a><br />
@endforeach
</p>
@stop