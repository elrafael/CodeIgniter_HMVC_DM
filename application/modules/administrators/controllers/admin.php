<?php

class Admin extends Admin_controller {
	
	public function __construct()
	{
		parent::__construct();
		$groups = new Group();
		$this->data['groups'] = $groups->get_by_active('1');
	}
	
	public function index()
	{
		$this->data['message'] = $this->session->flashdata('message');
		$administrators = new Administrator();
		$this->data['administrators'] = $administrators->get_by_active();
		
		$this->template->load($this->default_template, 'list', $this->data);
	}
	
	public function add()
	{
		$this->load->library('form_validation');
		
		if ( $this->_validation() == TRUE )
		{
			$action = $this->_action();
			
			if ( $action )
				$this->session->set_flashdata('message', 'Yupi! You have a new item!');
			else
				$this->session->set_flashdata('message', 'Caspita!! Something wrong');
			
			redirect('administrators/admin');
		}
		$this->template->load($this->default_template, 'crud', $this->data);
	}
	
	public function edit($id)
	{
		$administrator = new Administrator($id);
		$this->data['item'] = $administrator;
		$this->load->library('form_validation');
		if ( $this->_validation($id) == TRUE )
		{
			$action = $this->_action($id);
			
			if ( $action )
				$this->session->set_flashdata('message', 'Yupi! You have a new item!');
			else
				$this->session->set_flashdata('message', 'Caspita!! Something wrong');
			
			redirect('administrators/admin');
		}
		$this->template->load($this->default_template, 'crud', $this->data);
	}
	
	public function remove($id)
	{
		$administrators = new Administrator($id);
		$administrators->delete();
		
		redirect( 'administrators/admin' );
	}
	
	private function _validation($id = NULL)
	{
		$this->form_validation->set_rules('group_id', 	'Group', 	'required');
		$this->form_validation->set_rules('name', 		'Name', 	'required|max_length[90]');
		$this->form_validation->set_rules('email', 		'E-mail', 	'required|max_length[90]|valid_email');
		$pass_required = ($id == NULL) ? 'required' : '';
		$this->form_validation->set_rules('password', 	'Password', $pass_required);
		$this->form_validation->set_rules('active', 	'Active', 	'required');
		
		return $this->form_validation->run();
	}
	
	private function _action($id = NULL)
	{
		$administrator = new Administrator($id);
		$administrator->group_id 	= $this->input->post('group_id', 	TRUE);
		$administrator->name 		= $this->input->post('name', 		TRUE);
		$administrator->email 		= $this->input->post('email', 		TRUE);
		$administrator->active 		= $this->input->post('active', 		TRUE);
		$administrator->updated 	= gmdate('Y-m-d H:i:s');
		if ( $id == NULL )
			$administrator->created = gmdate('Y-m-d H:i:s');
		if ( $this->input->post('password') )
		{
			$this->load->helper('security');
			$administrator->password = do_hash( $this->input->post('password', TRUE) );
		}
		
		return $administrator->save();
	}
}