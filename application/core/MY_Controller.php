<?php

require_once APPPATH . 'third_party/MX/Controller' . EXT;

class MY_Controller extends MX_Controller {
	
	public $data = array();
	
	public function __construct()
	{
		parent::__construct();
	}
}