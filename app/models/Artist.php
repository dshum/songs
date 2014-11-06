<?php

class Artist extends Eloquent implements LemonTree\ElementInterface {

	use LemonTree\ElementTrait;

	public function getHref()
	{
		return \URL::route('artist', array('id' => $this->id));
	}

}
