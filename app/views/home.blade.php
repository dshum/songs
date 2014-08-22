@extends('layout')

@section('title', 'Songs')

@section('content')
<p>
@foreach ($artistList as $artist)
<a href="{{ $artist->getHref() }}">{{ $artist->name }}</a><br />
@endforeach
</p>
@stop