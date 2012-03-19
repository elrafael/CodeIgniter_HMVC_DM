<?php

class Administrators extends Public_controller {
	
	public function index()
	{
		if ( ! $this->session->userdata('admin_id') )
			redirect('administrators/login');
		$this->template->load('templates/admin', 'dashboard', $this->data);
	}
	
	public function login()
	{
		$this->data['message'] = $this->session->flashdata('message');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 		'E-mail', 	'required|valid_email');
		$this->form_validation->set_rules('password', 	'Password', 'required');
		if ( $this->form_validation->run() === TRUE )
		{
			$this->load->helper('security');
			$admin = new Administrator();
			$admin->where('email', $this->input->post('email', TRUE));
			$admin->where('password', do_hash($this->input->post('password', TRUE)));
			$admin->get_by_active('1');
			
			if ( $admin->result_count() > 0 )
				$this->session->set_userdata('admin_id', do_hash($admin->id));
			else
				$this->session->set_flashdata('message', 'E-mail and/or password invalid.');

			redirect('administrators/');
		}
		
		$this->template->load('templates/admin', 'login', $this->data);
	}
	
	public function logout()
	{
		$this->session->unset_userdata('admin_id');
		redirect('administrators');
	}
}