<?php

class Admin extends Public_controller {
	
	private $table_prefix = 'ci_';

	public function __construct()
	{
		parent::__construct();
		//Load the DB Forge and DB Util
		$this->load->dbforge();
		$this->load->dbutil();
		//Initialize
		$this->initialize();
	}

	/**
	 * Initialize this class
	 *
	 * @todo Better error messages
	 */
	public function initialize()
	{
		//Create Database
		if ( $this->_check_database() === FALSE )
			show_error('Database fail');
		//Create groups table
		if ( $this->_table_group() === FALSE )
			show_error('Table Group fail');
		//Create administrators table
		if ( $this->_table_administrator() === FALSE )
			show_error('Table Administrator fail');

		//Populate the tables above
		$group_id = $this->_populate_groups();
		$this->_populate_admins($group_id);
	}
	
	public function index()
	{
		echo 'index';
	}
	
	private function _check_database()
	{		
		if ( ! $this->dbutil->database_exists('ci') )
		{
			if ( $this->dbforge->create_database('ci') )
				return TRUE;
			else
				return FALSE;
		}
		return TRUE;
	}

	private function _table_group()
	{
		$table = $this->table_prefix . 'groups';
		if ( !$this->db->table_exists($table) )
		{
			//Fields
			$this->dbforge->add_field("id int(11) NOT NULL AUTO_INCREMENT");
			$this->dbforge->add_field("name varchar(45) DEFAULT NULL");
			$this->dbforge->add_field("created timestamp NULL DEFAULT NULL");
			$this->dbforge->add_field("updated timestamp NULL DEFAULT CURRENT_TIMESTAMP");
			$this->dbforge->add_field("active enum('1','0') DEFAULT '1'");
			//Primary keys
			$this->dbforge->add_key( 'id', TRUE );

			//Create table
			return $this->dbforge->create_table( $table );
		}

		return TRUE;
	}
	
	private function _table_administrator()
	{
		$table = $this->table_prefix . 'administrators';
		if ( !$this->db->table_exists($table) )
		{
			//Fields
			$this->dbforge->add_field("id int(11) NOT NULL AUTO_INCREMENT");
			$this->dbforge->add_field("group_id int(11) NOT NULL");
			$this->dbforge->add_field("name varchar(90) DEFAULT NULL");
			$this->dbforge->add_field("email varchar(90) DEFAULT NULL");
			$this->dbforge->add_field("password varchar(45) DEFAULT NULL");
			$this->dbforge->add_field("created timestamp NULL DEFAULT NULL");
			$this->dbforge->add_field("updated timestamp NULL DEFAULT CURRENT_TIMESTAMP");
			$this->dbforge->add_field("active enum('1','0') DEFAULT '1'");
			//Primary keys
			$this->dbforge->add_key( array('id', 'group_id'), TRUE );
			$this->dbforge->add_key('group_id');

			//Create table
			$this->dbforge->create_table( $table );

			//Create Foreign Key
			$this->db->query("ALTER TABLE $table ADD FOREIGN KEY (  group_id )
				REFERENCES  ci_groups ( id ) ON DELETE CASCADE ON UPDATE RESTRICT;");
		}

		return TRUE;
	}
	
	private function _populate_groups()
	{
		$group = new Group();
		$group->name 	= 'Super';
		$group->created	= gmdate('Y-m-d H:i:s');
		$group->updated	= gmdate('Y-m-d H:i:s');
		$group->active	= '1';
		$group->save();

		return $group->id;
	}

	private function _populate_admins($group_id = 1)
	{
		$this->load->helper('security');
		$admin = new Administrator();
		$admin->group_id	= $group_id;
		$admin->name		= 'Administrator';
		$admin->email		= 'your_email@server.tdl';
		$admin->password	= do_hash('password');
		$admin->created		= gmdate('Y-m-d H:i:s');
		$admin->updated		= gmdate('Y-m-d H:i:s');
		$admin->active		= '1';
		$admin->save();
	}
}