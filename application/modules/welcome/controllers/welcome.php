<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends Public_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		echo __FILE__;
		$this->template->build('welcome_message');
	}


	public function message()
	{	
		$this->data['mensagem'] = $this->session->flashdata('dump2');
		
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
		{
			$this->session->set_flashdata('dump2', gmdate('Y-m-d H:i:s'));

			redirect( current_url() );
		}

		$this->template->build('message', $this->data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */