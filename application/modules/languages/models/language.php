<?php

class Language extends DataMapper {

	public $has_many = array('blog');

	public function __construct($id = NULL)
	{
		parent::__construct($id);
		//Datamapper::add_model_path( array( APPPATH . 'modules/blogs' ) );
	}
}