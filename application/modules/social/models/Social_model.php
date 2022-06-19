<?php

class Social_model extends CI_Model{

	protected $table = 'socials';

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
			->from($this->table)
			->where('id', $id)
			->get()
			->result();

	}

	public function active(){

		return $this->db
			->where('status', 1)
			->from($this->table)
			->get()
			->result_array();

	}

	public function sortByOrder($column, $order, $status = false){

		$this->db->from($this->table);

		if($status){
			$this->db->where('status', 1);
		}

		$this->db->order_by($column, $order);

		$q = $this->db->get();

		return $q->result_array();


	}

	public function create($data){

		$this->db->insert($this->table, $data);

	}

	public function createBatch($data){

		$this->db->insert_batch($this->table, $data);

	}

	public function update($id, $data){             

		$this->db->where('id', $id);

		$this->db->update($this->table, $data);
			 
	}

	public function updateBatch($data, $column){              

		$this->db->update_batch($this->table, $data, $column); 

	}

	public function createOrUpdateBatch($data, $column){

		$this->db->trans_start();

		if(count($this->all())){

			$this->updateBatch($data, $column);

		}else{

			$this->createBatch($data);
		}

		$this->db->trans_complete();

		if($this->db->affected_rows() != '1' && $this->db->trans_status() === FALSE) return false;

		return true;

	}


}