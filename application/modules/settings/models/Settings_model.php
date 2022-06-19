<?php

class Settings_Model extends CI_Model {

	protected $table = 'settings';
 
	function __construct(){

		parent::__construct();

	}

	public function get(){

		return $this->db
			->from('users')
			->join($this->table, 'users.id = settings.user_id', 'left')
			->get()
			->row(); 

	}

	public function getColumn($columns){

		return $this->db
			->select($columns)
			->from('users')
			->join($this->table, 'users.id = settings.user_id', 'left')
			->get()
			->row(); 

	}

	public function create($data){

		return $this->db->insert($this->table, $data);

	}
	
	public function update($id, $data){

		$this->db
			->where('id', $id)
			->update($this->table, $data);

		return $this->db->affected_rows() > 0;
			 
	}

	public function updateOrCreate($id, $data){

		empty($id) ? $this->create($data) : $this->update($id, $data);

	}


}