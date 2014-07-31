@extends('error')

@section('title', 'Flutta | 404')

@section('content')
<h1><a href="{{ URL::route('home') }}">Flutta</a></h1> <h2>404</h2>
<p>Страница не найдена.</p>
@stop