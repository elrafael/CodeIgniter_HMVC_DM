<?php

class Admin_controller extends MY_Controller {
	
	public $default_template = 'templates/admin';
	
	public function __construct()
	{
		parent::__construct();
		if ( ! $this->session->userdata('admin_id') )
			redirect('administrators/login');
	}
}