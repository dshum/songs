<?php namespace LemonTree;

$site = \App::make('site');

$site->initMicroTime();

$site->

	/*
	 * Исполнитель
	 */

	addItem(
		Item::create('Artist')->
		setTitle('Исполнитель')->
		setMainProperty('name')->
		setRoot(true)->
		addOrderBy('name', 'asc')->
		addProperty(
			TextfieldProperty::create('name')->
			setTitle('Название')->
			setRequired(true)->
			setShow(true)
		)->
		addProperty(
			DatetimeProperty::create('created_at')->
			setTitle('Дата создания')->
			setReadonly(true)->
			setShow(true)
		)->
		addProperty(
			DatetimeProperty::create('updated_at')->
			setTitle('Последнее изменение')->
			setReadonly(true)->
			setShow(true)
		)
	)->

	/*
	 * Песня
	 */

	addItem(
		Item::create('Song')->
		setTitle('Песня')->
		setMainProperty('name')->
		addOrderBy('name', 'asc')->
		addProperty(
			TextfieldProperty::create('name')->
			setTitle('Название')->
			setRequired(true)->
			setShow(true)
		)->
		addProperty(
			TextareaProperty::create('text')->
			setTitle('Текст')
		)->
		addProperty(
			OneToOneProperty::create('artist_id')->
			setTitle('Исполнитель')->
			setRelatedClass('Artist')->
			setDeleting(OneToOneProperty::RESTRICT)->
			setRequired(true)->
			setShow(true)
		)->
		addProperty(
			DatetimeProperty::create('created_at')->
			setTitle('Дата создания')->
			setReadonly(true)->
			setShow(true)
		)->
		addProperty(
			DatetimeProperty::create('updated_at')->
			setTitle('Последнее изменение')->
			setReadonly(true)->
			setShow(true)
		)
	)->

	bind(Site::ROOT, 'Artist')->
	bind('Artist', 'Song')->

	bindTree(Site::ROOT, 'Artist')->
	bindTree('Artist', 'Song')->

	end();
