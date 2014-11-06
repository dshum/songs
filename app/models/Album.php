<?php

class Album extends Eloquent implements LemonTree\ElementInterface {

	use LemonTree\ElementTrait;

	public function getHref()
	{
		return \URL::route('album', array('id' => $this->id));
	}

	public function artist()
	{
		return $this->belongsTo('Artist');
	}

}
