<?php


class Setting_model extends CI_Model {

 	protected $table = 'hyper_settings';


	function __construct(){

		parent::__construct();

	}

	public function all(){

		return $this->db
			->from($this->table)
			->get()
			->result_array();

	}

	public function findById($id){

		return $this->db
			->where('page_id', $id)
			->from($this->table)
			->get()
			->result();

	}

	public function update($id, $data){              
		
		$this->db
			->where('id', $id)
			->update($this->table, $data);

	}


}