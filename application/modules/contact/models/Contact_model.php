<?php

class Contact_Model extends CI_Model {

	protected $table = 'contacts';
 
	function __construct(){

		parent::__construct();

	}

	public function get(){

		return $this->db

			->from($this->table)
			->get()
			->row(); 

	}

	public function create($data){

		return $this->db->insert($this->table, $data);

	}
	
	public function update($id, $data){

		return $this->db
			->where('id', $id)
			->update($this->table, $data);
			 
	}

	public function updateOrCreate($id, $data){

		empty($id) ? $this->create($data) : $this->update($id, $data);

		$this->db->cache_delete('admin', 'contact');

	}


}