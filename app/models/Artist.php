<?php

class Artist extends LemonTree\Element {

	public function newQuery($excludeDeleted = true)
	{
		$builder = parent::newQuery();

		return $builder->cacheTags('Artist')->rememberForever();
	}

	public function getHref()
	{
		return \URL::route('artist', array('id' => $this->id));
	}

}
