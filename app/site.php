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
	 * Альбом
	 */

	addItem(
		Item::create('Album')->
		setTitle('Альбом')->
		setMainProperty('name')->
		addOrderBy('year', 'asc')->
		addOrderBy('name', 'asc')->
		addProperty(
			TextfieldProperty::create('name')->
			setTitle('Название')->
			setRequired(true)->
			setShow(true)
		)->
		addProperty(
			TextfieldProperty::create('year')->
			setTitle('Год')->
			setRequired(true)->
			setShow(true)
		)->
		addProperty(
			OneToOneProperty::create('artist_id')->
			setTitle('Исполнитель')->
			setRelatedClass('Artist')->
			setDeleting(OneToOneProperty::RESTRICT)->
			setParent(true)->
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
		addOrderBy('number', 'asc')->
		addOrderBy('name', 'asc')->
		addProperty(
			TextfieldProperty::create('name')->
			setTitle('Название')->
			setRequired(true)->
			setShow(true)
		)->
		addProperty(
			TextfieldProperty::create('number')->
			setTitle('Номер')->
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
			OneToOneProperty::create('album_id')->
			setTitle('Альбом')->
			setRelatedClass('Album')->
			setDeleting(OneToOneProperty::RESTRICT)->
			setParent(true)->
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
	bind('Artist', 'Album', 'Song')->
	bind('Album', 'Song')->

	bindTree(Site::ROOT, 'Artist')->
	bindTree('Artist', 'Album', 'Song')->
	bindTree('Album', 'Song')->

	end();
