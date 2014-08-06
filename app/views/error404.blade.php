@extends('error')

@section('title', 'Songs | 404')

@section('content')
<h1><a href="{{ URL::route('home') }}">Songs</a></h1> <h2>404</h2>
<p>Страница не найдена.</p>
@stop