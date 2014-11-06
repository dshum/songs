<?php

class Song extends Eloquent implements LemonTree\ElementInterface {

	use LemonTree\ElementTrait;

	public function getHref()
	{
		return \URL::route('song', array('id' => $this->id));
	}

	public function artist()
	{
		return $this->belongsTo('Artist');
	}

	public function album()
	{
		return $this->belongsTo('Album');
	}

}
