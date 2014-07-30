<?php

class Artist extends LemonTree\Element {

	public function getHref()
	{
		return \URL::route('artist', array('id' => $this->id));
	}

}
