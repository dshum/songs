@extends('layout')

@section('js')
<script type="text/javascript">
$(function() {
	$('input[type="text"],textarea').each(function() {
		if ($(this).val() == $(this).attr('default')) {
			$(this).addClass('grey');
		} else {
			$(this).removeClass('grey');
		}
	}).focus(function() {
		if ($(this).val() == $(this).attr('default')) {
			$(this).val('');
		}
		$(this).removeClass('grey');
	}).blur(function() {
		if ( ! $(this).val()) {
			$(this).val($(this).attr('default'));
		}
		if ($(this).val() == $(this).attr('default')) {
			$(this).addClass('grey');
		}
	});

	$('input[name="artist"]').autocomplete({
			source: '{{ URL::route("hint") }}',
			select: function(event, ui) {
				$(this).val(ui.item.value);
			},
			minLength: 0
		});
});
</script>
@stop

@section('title', 'Новая песня')

@section('content')
<h2><a href="{{ $currentArtist->getHref() }}">{{ $currentArtist->name }}</a></h2>
<h3><a href="{{ $currentSong->getHref() }}">{{ $currentSong->name }}</a></h3>
{{ Form::open(array('route' => array('save', $currentSong->id), 'method' => 'post')) }}
<p>{{ Form::text('artist', $artistName ? $artistName : 'Исполнитель', array('default' => 'Исполнитель', 'class' => in_array('artist', $error) ? 'red' : null, )) }}</p>
<p>{{ Form::text('song', $songName ? $songName : 'Название', array('default' => 'Название', 'class' => in_array('song', $error) ? 'red' : null, )) }}</p>
<p>{{ Form::textarea('text', $songText ? $songText : 'Текст', array('default' => 'Текст', 'class' => in_array('text', $error) ? 'red' : null, )) }}</p>
<p>{{ Form::submit('Сохранить') }}</p>
{{ Form::close() }}
@stop