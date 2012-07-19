<?php

class Admin_controller extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
		if ( ! $this->session->userdata('admin_id') )
			redirect('administrators/login');
		$this->template->set_layout('admin');
	}
}
/* End of file Admin_controller.php */
/* Location: ./application/core/Admin_controller.php */