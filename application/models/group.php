<?php

class Group extends DataMapper {
	
	public $has_many = array('administrator');

	public $validation = array(
			'id' => array(
				'label' => 'ID'
			),
			'name' => array(
				'label' => 'Name'
			),
			'created' => array(
				'label' => 'Created'
			),
			'updated' => array(
				'label' => 'Updated'
			),
			'active' => array(
				'label' => 'Active'
			)
	);
	
	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}