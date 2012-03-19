<?php

class Admin extends Admin_controller {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->data['message'] = $this->session->flashdata('message');
		$groups = new Group();
		$this->data['groups'] = $groups->get_by_active();
		
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
			
			redirect('groups/admin');
		}
		$this->template->load($this->default_template, 'crud', $this->data);
	}
	
	public function edit($id)
	{
		$groups = new Group($id);
		$this->data['item'] = $groups;
		$this->load->library('form_validation');
		if ( $this->_validation($id) == TRUE )
		{
			$action = $this->_action($id);
			
			if ( $action )
				$this->session->set_flashdata('message', 'Yupi! You have a new item!');
			else
				$this->session->set_flashdata('message', 'Caspita!! Something wrong');
			
			redirect('groups/admin');
		}
		$this->template->load($this->default_template, 'crud', $this->data);
	}
	
	public function remove($id)
	{
		$groups = new Group($id);
		$groups->delete();
		
		redirect( 'groups/admin' );
	}
	
	private function _validation($id = NULL)
	{
		$this->form_validation->set_rules('name', 		'Name', 	'required|max_length[90]');
		$this->form_validation->set_rules('active', 	'Active', 	'required');
		
		return $this->form_validation->run();
	}
	
	private function _action($id = NULL)
	{
		$groups = new Group($id);
		$groups->name 		= $this->input->post('name', 		TRUE);
		$groups->active 	= $this->input->post('active', 		TRUE);
		$groups->updated 	= gmdate('Y-m-d H:i:s');
		if ( $id == NULL )
			$groups->created = gmdate('Y-m-d H:i:s');
		
		return $groups->save();
	}
}