<?php

class Album extends LemonTree\Element {

	public function getHref()
	{
		return \URL::route('album', array('id' => $this->id));
	}

}
