<?php

class MY_Controller extends MX_Controller {
	
	public $data = array();
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
}
/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */