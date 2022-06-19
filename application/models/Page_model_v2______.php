<?php


class Page_model_v2 extends CI_Model {


	protected $table = 'page_templates';
 
	function __construct(){

		parent::__construct();

	}

	public function all(){

		$this->db->from($this->table);

		$q = $this->db->get();
		
		return $q->result_array(); 

	}

	public function find($column, $value){

		$this->db->where($column, $value);

		$this->db->from($this->table);

		$this->db->order_by("id", "desc");

		$q = $this->db->get();

		return $q->result_array();

	}

	public function findById($id){

		$this->db->where('id', $id);

		$this->db->from($this->table);

		$result = $this->db->get()->result_array()[0];

		return $result;

	}

	public function active(){

		$this->db->where('status', 1);

		$this->db->from($this->table);

		$q = $this->db->get();

		return $q->result_array();

	}

	public function create($data){

		$this->db->insert($this->table, $data);

	}
	
	public function update($id, $data){             

		$this->db->where('id', $id);

		$this->db->update($this->table, $data);
			 
	}

	public function delete($id){

		$this->db->where('id', $id);

		$this->db->delete($this->table);

		return $this->db->affected_rows();

	}

	public function allRoutes(){

		return $this->db->get_where($this->table, ['status' => 1])->result_array();

	}


}