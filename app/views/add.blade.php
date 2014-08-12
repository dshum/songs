@extends('layout')

@section('title', 'Новая песня')

@section('content')
<h1><a href="{{ URL::route('home') }}">Songs</a></h1> <h2>Новая песня</h2>
{{ Form::model('Song') }}
<p>{{ Form::text('artist', 'Исполнитель') }}</p>
<p>{{ Form::text('album', 'Альбом') }}{{ Form::text('year', 'Год', array('class' => 'short')) }}</p>
<p>{{ Form::text('name', 'Название') }}{{ Form::text('number', '№', array('class' => 'short')) }}</p>
<p>{{ Form::textarea('text', 'Текст') }}</p>
<p>{{ Form::submit('Добавить') }}</p>
{{ Form::close() }}
@stop