<?php

class Teste extends Public_controller {

	public function index()
	{
		$this->load->library('tal');
		$this->tal->display('phptal');
	}
}