@extends('layout')

@section('title', 'Songs')

@section('content')
<h1>Songs</h1>
<p>
@foreach ($artistList as $artist)
<a href="{{ $artist->getHref() }}">{{ $artist->name }}</a><br />
@endforeach
</p>
@stop