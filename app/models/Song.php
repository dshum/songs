<?php

class Song extends LemonTree\Element {

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
