@extends('layout')

@section('title', 'Songs')

@section('content')
<h1><a href="{{ URL::route('add') }}">+</a></h1> <h1>Songs</h1>
<p>
@foreach ($artistList as $artist)
<a href="{{ $artist->getHref() }}">{{ $artist->name }}</a><br />
@endforeach
</p>
@stop