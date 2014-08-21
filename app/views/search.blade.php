@extends('layout')

@section('title', 'Поиск')

@section('content')
<h1><a href="{{ URL::route('home') }}">Songs</a></h1> <h2>Поиск</h2>
<p>
@foreach ($songList as $song)
<a href="{{ $song->getHref() }}">{{ $song->name }}</a><br />
@endforeach
</p>
@stop