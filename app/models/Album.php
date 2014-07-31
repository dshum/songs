<?php

class Album extends LemonTree\Element {

	public function newQuery($excludeDeleted = true)
	{
		$builder = parent::newQuery();

		return $builder->cacheTags('Album')->rememberForever();
	}

	public function getHref()
	{
		return \URL::route('album', array('id' => $this->id));
	}

	public function artist()
	{
		return $this->belongsTo('Artist');
	}

}
