<?php

class Administrator extends DataMapper {
	
	public $has_one = array('group');

	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}