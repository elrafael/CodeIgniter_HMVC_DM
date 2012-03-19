<?php

class Group extends DataMapper {
	
	public $has_many = array('administrator');
	
	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}