<?php

class Administrator extends DataMapper {
	
	public $has_one = array('group');
	public $validation = array(
		'id' => array(
			'label' => 'ID'
		),
		'group_id' => array(
			'label' => 'Group'
		),
		'name' => array(
			'label' => 'Name'
		),
		'email' => array(
			'label' => 'E-mail'
		)
	);

	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
/* End of file administrator.php */
/* Location: ./application/models/administrator.php */