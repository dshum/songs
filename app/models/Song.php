<?php

class Song extends LemonTree\Element {

	public function getHref()
	{
		return \URL::route('song', array('id' => $this->id));
	}

}
